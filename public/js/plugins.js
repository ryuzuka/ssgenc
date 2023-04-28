/** pluginManager.js ******************************************************************************************************** */
;($ => {
  let pluginPool = {}
  let pluginIndex = 0

  /** plugin manager */
  $.extend({
    plugin: {
      add ($el, _pluginName, _plugin) {
        if ($el.attr('applied-plugin')) {
          return
        }
        let pluginId = _pluginName + pluginIndex
        $el.attr('applied-plugin', pluginId)
        pluginPool[pluginId] = _plugin
        pluginIndex++
      },
      remove ($el) {
        delete pluginPool[$el.attr('applied-plugin')]
        $el.removeAttr('applied-plugin')
      },
      call ($el, _method, _value) {
        let pluginId = $el.attr('applied-plugin')
        if (!pluginId) {
          return
        }
        pluginPool[pluginId][_method](_value)
        if (_method === 'clear') {
          this.remove($el)
        }
      }
    }
  })

  /** plugins execution */
  $(function () {
    $('.js-accordion').accordion()
    $('.js-dropdown').dropdown()
    $('.js-textarea').textarea()
    $('.js-tab').tab()
    $('.js-attach-file').attachFile()
  })
})(window.jQuery)
/** ****************************************************************************************************************** */

/** accordion.js ********************************************************************************************************** */
;($ => {
  let pluginName = 'accordion'

  $.fn.extend({
    accordion: function (options = {}, value) {
      if (typeof options === 'string') {
        $.plugin.call(this, options, value)
      } else {
        this.each((index, el) => {
          if (!$(el).attr('applied-plugin')) {
            $.plugin.add($(el), pluginName, new Accordion($(el), options))
          }
        })
      }
      return this
    }
  })

  class Accordion {
    constructor ($this, options) {
      this.$accordion = $this
      this.$btn = this.$accordion.find('.accordion-head > button')
      this.$content = this.$accordion.find('.accordion-content')

      this.options = options
      this.activeIndex = (this.options.activeIndex >= 0) ? this.options.activeIndex : -1

      this.init()
    }

    init () {
      let _this = this
      this.$btn.each((index, el) => {
        $(el).attr('btn-index', index)
      })

      if (typeof this.activeIndex === 'number') {
        this.active(this.activeIndex)
      }

      this.$btn.on('click', e => {
        let idx = Number($(e.currentTarget).attr('btn-index'))
        this.activeIndex = idx
        this.$content.each((index, el) => {
          let $btn = _this.$btn.eq(index)
          let $content = _this.$content.eq(index)

          if (idx === index) {
            if (!$btn.hasClass('active')) {
              $btn.addClass('active').attr('aria-expanded', true)
              $content.addClass('active').prop('hidden', false)
            } else {
              $btn.removeClass('active').attr('aria-expanded', false)
              $content.removeClass('active').prop('hidden', true)
            }
          } else {
            $btn.removeClass('active').attr('aria-expanded', false)
            $content.removeClass('active').prop('hidden', true)
          }
        })
        this.$accordion.triggerHandler({type: 'open', activeIndex: this.activeIndex})
      })
    }

    active (idx) {
      this.activeIndex = idx
      this.$content.each(index => {
        if (idx === index) {
          this.$btn.eq(index).addClass('active').attr('aria-expanded', true)
          this.$content.eq(index).addClass('active').prop('hidden', false)
        } else {
          this.$btn.eq(index).removeClass('active').attr('aria-expanded', false)
          this.$content.eq(index).removeClass('active').prop('hidden', true)
        }
      })
    }

    clear () {
      this.$btn.attr('aria-expanded', false).removeClass('active').off('click')
      this.$content.prop('hidden', true).removeClass('active')
    }
  }
})(window.jQuery)
/** ****************************************************************************************************************** */

/** attachFile.js ********************************************************************************************************** */
;($ => {
  let pluginName = 'attachFile'

  $.fn.extend({
    attachFile: function (options = {}, value) {
      if (typeof options === 'string') {
        $.plugin.call(this, opions, value)
      } else {
        this.each((index, el) => {
          if (!$(el).attr('applied-plugin')) {
            $.plugin.add($(el), pluginName, new AttachFile($(el), options))
          }
        })
      }
      return this
    }
  })

  class AttachFile {
    constructor ($this, options) {
      this.$text = $this.find('.attach-text')
      this.$file = $this.find('.attach-file')

      this.$file.on('change', e => {
        let fileName = this.$file.val().replace(/C:\\fakepath\\/i, '')
        this.$text.val(fileName)
      })
    }
  }
})(window.jQuery)
/** ****************************************************************************************************************** */

/** blockBodyScroll.js ****************************************************************************************************** */
;($ => {
  let _plugin = null

  $.extend({
    blockBodyScroll: function (isBlock) {
      _plugin = _plugin || new BlockBodyScroll()

      let method = isBlock ? 'block' : 'scroll'
      _plugin[method]()

      return _plugin
    }
  })

  class BlockBodyScroll {
    constructor () {
      this.prevScroll = 0
      this.$body = $('body')
      this.isBlock = false
    }

    block () {
      if (this.$body.hasClass('block-body-scroll')) {
        this.isBlock = true
      }

      this.prevScroll = window.scrollY || window.pageYOffset
      let style = 'overflow: hidden; width: 100%; height: 100%; min-width: 100%; min-height: 100%;'
      if ($.util.isMobile()) {
        style += ' ' + `position: fixed; margin-top: ${-1 * this.prevScroll}px;`
      }
      this.$body.attr('style', style).addClass('block-body-scroll')
    }

    scroll () {
      if (this.isBlock) {
        this.isBlock = false
        return
      }

      this.$body.removeAttr('style').removeClass('block-body-scroll')
      $(window).scrollTop(this.prevScroll)
    }
  }
})(window.jQuery)
/** ***************************************************************************************************************** */

/** dropdown.js ****************************************************************************************************** */
;($ => {
  let pluginName = 'dropdown'

  $.fn.extend({
    dropdown: function (options = {}, value) {
      if (typeof options === 'string') {
        $.plugin.call(this, options, value)
      } else {
        this.each((index, el) => {
          if (!$(el).attr('applied-plugin')) {
            $.plugin.add($(el), pluginName, new Dropdown($(el), options))
          }
        })
      }
      return this
    }
  })

  class Dropdown {
    constructor ($this, options) {
      let _this = this

      this.$dropdown = $this
      this.$button = this.$dropdown.find('.dropdown-btn')

      this.options = options

      let defaultIndex = 0
      this.placeholder = this.$dropdown.attr('placeholder')
      if (this.placeholder) {
        defaultIndex = -1
        this.$button.text(this.$dropdown.attr('placeholder'))
        this.$dropdown.find('.dropdown-list li').each(function (index) {
          if (_this.placeholder === $(this).find('button, a').text()) {
            defaultIndex = index
          }
        })
      } else {
        defaultIndex = 0
      }
      this.activeIndex = (this.options.activeIndex >= 0) ? this.options.activeIndex : defaultIndex
      this.disableIndex = this.options.disableIndex

      this.init()
    }

    init () {
      if (typeof this.activeIndex === 'number') {
        this.active(this.activeIndex)
      }
      if (typeof this.disableIndex === 'number') {
        this.disable([this.disableIndex])
      } else if (typeof this.disableIndex === 'object') {
        this.disable(this.disableIndex)
      }

      this.$button.on('click', e => {
        if (this.$dropdown.find('.dropdown-list').hasClass('active')) {
          this.toggle(false)
        } else {
          this.toggle(true)
        }
      })
      this.$dropdown.find('.dropdown-list li button').on('click', e => {
        if ($(e.currentTarget).hasClass('disabled')) {
          return false
        }
        let idx = $(e.currentTarget).parent().index()
        if (idx !== this.activeIndex) {
          this.active(idx)
        }
        this.toggle(false)
      })
      this.$dropdown.find('.dropdown-btn, .dropdown-list').on('focusout', e => {
        if (e.relatedTarget === null || $(e.relatedTarget).closest('.js-dropdown').length < 1) {
          this.toggle(false)
        }
      })
    }

    toggle (isOpen) {
      if (isOpen) {
        this.$dropdown.find('.dropdown-list').addClass('active')
      } else {
        this.$dropdown.find('.dropdown-list').removeClass('active')
      }
      this.$button.attr('aria-expanded', isOpen)

      return this.$dropdown
    }

    active (idx) {
      this.$dropdown.find('.dropdown-list li').each((index, el) => {
        if (idx === index) {
          this.activeIndex = index
          $(el).addClass('active').attr('aria-selected', true)
          this.$button.text($(el).find('button, a').text()).addClass('active')

          let value = $(el).find('button, a').data('value')
          this.$dropdown.triggerHandler({type: 'change', activeIndex: this.activeIndex, value: value})
        } else {
          $(el).removeClass('active').attr('aria-selected', false)
        }
      })
    }

    disable (index) {
      // index[type: Number or Array]
      if (typeof (index) === 'number') {
        // Number
        this.$dropdown.find('.dropdown-list li').eq(index).find('button, a').addClass('disabled', true)
      } else {
        // Array
        index.forEach(val => {
          this.$dropdown.find('.dropdown-list li').eq(val).find('button, a').addClass('disabled', true)
        })
      }
    }

    clear () {
      this.$dropdown.find('.dropdown-list li button').removeClass('disabled').off('click')
      this.$button.removeAttr('aria-expanded').off('click')
    }
  }
})(window.jQuery)
/** ****************************************************************************************************************** */

/** loading.js ****************************************************************************************************** */
;($ => {
  let _plugin = null

  $.extend({
    loading: function (method) {
      let $loading = $(`<div class="loading-wrap" style="display: none">
        <!--: Start #contents -->
        <svg class="loading" width="46" height="46">
          <defs>
            <filter x="-11.8%" y="-11.7%" width="123.5%" height="123.5%" filterUnits="objectBoundingBox" id="b">
              <feMorphology radius=".2" operator="dilate" in="SourceAlpha" result="shadowSpreadOuter1"/>
              <feOffset in="shadowSpreadOuter1" result="shadowOffsetOuter1"/>
              <feGaussianBlur stdDeviation="1.5" in="shadowOffsetOuter1" result="shadowBlurOuter1"/>
              <feComposite in="shadowBlurOuter1" in2="SourceAlpha" operator="out" result="shadowBlurOuter1"/>
              <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.24 0" in="shadowBlurOuter1"/>
            </filter>
            <path d="M20 0c11.046 0 20 8.954 20 20s-8.954 20-20 20S0 31.046 0 20 8.954 0 20 0zm0 8C13.373 8 8 13.373 8 20s5.373 12 12 12 12-5.373 12-12S26.627 8 20 8z" id="a"/>
          </defs>
          <g transform="translate(3 3)" fill="none" fill-rule="evenodd">
            <mask id="c" fill="#fff"><use xlink:href="#a"/></mask>
            <use fill="#000" filter="url(#b)" xlink:href="#a"/>
            <path stroke-opacity=".24" stroke="#000" stroke-width=".2" d="M20-.1c5.55 0 10.575 2.25 14.213 5.887A20.037 20.037 0 0140.1 20c0 5.55-2.25 10.575-5.887 14.213A20.037 20.037 0 0120 40.1c-5.55 0-10.575-2.25-14.213-5.887A20.037 20.037 0 01-.1 20c0-5.55 2.25-10.575 5.887-14.213A20.037 20.037 0 0120-.1zm0 8.2a11.863 11.863 0 00-8.415 3.485A11.863 11.863 0 008.1 20c0 3.286 1.332 6.261 3.485 8.415A11.863 11.863 0 0020 31.9c3.286 0 6.261-1.332 8.415-3.485A11.863 11.863 0 0031.9 20c0-3.286-1.332-6.261-3.485-8.415A11.863 11.863 0 0020 8.1z"/>
            <image mask="url(#c)" width="40" height="40" xlink:href="data:image/png;base64,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"/>
          </g>
        </svg>
        <!--: End #contents -->
      </div>`)

      _plugin = _plugin || new Loading($loading)
      _plugin[method]()

      return $loading
    }
  })

  class Loading {
    constructor ($loading) {
      this.$loading = $loading
      $('body').append(this.$loading)
    }

    start () {
      $.preventScroll(true)
      this.$loading.show()

      return this.$loading
    }

    stop () {
      this.$loading.hide()
      $.preventScroll(false)

      return this.$loading
    }
  }
})(window.jQuery)
/** ***************************************************************************************************************** */

/** modal.js ******************************************************************************************************** */
;($ => {
  let _modalPlugin = {}

  $.fn.extend({
    modal: function (options = {}, callback) {
      const id = this.attr('id')
      if (typeof options === 'string') {
        _modalPlugin[id][options](callback)
      } else {
        _modalPlugin[id] = new Modal(this, options, callback)
      }
      return this
    }
  })

  class Modal {
    constructor ($this, options, callback) {
      this.$modal = $this
      this.id = $this.attr('id')
      this.callback = callback || function () {}
      this.prevScroll = 0

      const defaultOptions = {
        classes: '',
        dimmed: true,
        clickToClose: true,
        blockBodyScroll: true
      }

      if (typeof options === 'object') {
        this.options = $.extend(defaultOptions, options)
      } else if (typeof options === 'function') {
        this.options = defaultOptions
        this.callback = options
      }

      if (this.options.dimmed) {
        this.options.classes += ' dimmed'
      }

      this.init()
    }

    init () {
      this.$modal.addClass(this.options.classes)
      let $form = $('#' + this.id).find('button, input, select, textarea')
      let $firstForm = null
      $form.each((index, el) => {
        if (index === 0) {
          $firstForm = $(el)
          setTimeout(() => {
            $firstForm.focus().focus()
          }, 1)
        } else if (index === $form.length - 1) {
          $(el).on('focusout', e => {
            $firstForm.focus()
          })
        }
      })

      // button
      this.$modal.find('.button-wrap button').on('click', e => {
        this.close({buttonIndex: $(e.target).index()})
      })

      // dimmed close
      this.$modal.on('click', e => {
        let $target = $(e.target)
        if ($target.attr('id') === this.$modal.attr('id') && $target.hasClass('layer')) {
          if (!this.options.clickToClose) return
          this.close()
        }
      })

      // close
      this.$modal.on('keydown', e => {
        if (e.keyCode === 27) {
          this.close()
        }
      })
      this.$modal.find('.close').on('click', e => {
        this.close()
      })

      // open
      this.open()
    }

    open () {
      this.$modal.show()
      this.callback({type: 'open', $modal: this.$modal})

      if (this.options.blockBodyScroll) {
        $.blockBodyScroll(true)
      } else {
        $.blockBodyScroll(false)
      }
    }

    close (buttonIndex) {
      this.callback($.extend({type: 'before-close', $modal: this.$modal}, buttonIndex))
      this.$modal.find('button, input, select, textarea').off()
      this.$modal.removeClass(this.options.classes).off().hide()

      if (this.options.blockBodyScroll) {
        $.blockBodyScroll(false)
      }
      setTimeout(() => {
        this.callback({type: 'close', $modal: this.$modal})
        $(this.options.closedFocus).focus()
      }, 1)
    }
  }
})(window.jQuery)
/** ***************************************************************************************************************** */

/** paging.js ********************************************************************************************************** */
;($ => {
  let _this = null
  let pluginName = 'paging'

  $.fn.extend({
    paging: function (options = {}, value) {
      if (typeof options === 'string') {
        $.plugin.call(this, options, value)
      } else {
        this.each((index, el) => {
          if (!$(el).attr('applied-plugin')) {
            $.plugin.add($(el), pluginName, new Paging($(el), options))
          }
        })
      }
      return this
    }
  })

  class Paging {
    constructor ($this, options) {
      _this = this
      this.$paging = $this
      this.$pagingList = this.$paging.find('.paging-list')

      this.options = options
      this.offset = options.offset || 0 // 현재 페이지 index
      this.limit = options.limit || 5 // 화면에 보여지는 리스트 갯수
      this.total = options.total // 전체 리스트 갯수
      this.totalPage = Math.ceil(this.total / this.limit) // 전체 페이지 갯수
      this.pagingLength = options.pagingLength || 10 // 화면에 보여지는 paging button 갯수
      this.pagingGroupLength = Math.ceil(this.totalPage / this.pagingLength)

      this.pagingGroup = []
      this.groupIndex = 0

      this.init()
    }

    init () {
      this.$paging.find('.paging-prev, .paging-next, .paging-first, .paging-last').on('click', e => {
        let {className} = e.currentTarget
        let _curIdx = 0
        if (className.indexOf('prev') > 0) {
          this.groupIndex--
          let pagingLength = this.pagingGroup[this.groupIndex].length
          _curIdx = this.pagingGroup[this.groupIndex][pagingLength - 1].pagingIndex
        } else if (className.indexOf('next') > 0) {
          this.groupIndex++
          _curIdx = this.pagingGroup[this.groupIndex][0].pagingIndex
        }
        if (className.indexOf('first') > 0) {
          this.groupIndex = 0
          _curIdx = 0
        } else if (className.indexOf('last') > 0) {
          this.groupIndex = this.pagingGroup.length - 1
          _curIdx = this.totalPage - 1
        }
        this.draw(this.groupIndex)
        this.activePaging(_curIdx)
        this.$paging.triggerHandler({type: 'change', offset: this.offset, total: this.totalPage})
      })

      $(window).on('resize-view-type', (e, viewType) => {
        if (viewType === 'pc') {
          this.resize(10)
        } else if (viewType === 'mobile') {
          this.resize(5)
        }
      })

      if ($.viewType === 'pc') {
        this.resize(10)
      } else if ($.viewType === 'mobile') {
        this.resize(5)
      }
    }

    resize (pageLength) {
      this.pagingGroup = []

      this.totalPage = Math.ceil(this.total / this.limit) // 전체 페이지 갯수
      this.pagingLength = pageLength || 10 // 화면에 보여지는 paging button 갯수 (defulat:: 10) | mobile (default: 5)
      this.pagingGroupLength = Math.ceil(this.totalPage / this.pagingLength)

      this.setPagingGroup(this.offset)
      this.draw(this.groupIndex)
      this.activePaging(this.offset)
    }

    setPagingGroup (curIdx) {
      this.pagingGroup = []
      for (let i = 0; i < this.pagingGroupLength; ++i) {
        this.pagingGroup[i] = []

        let _length = this.pagingLength
        if (this.totalPage - i * this.pagingLength < this.pagingLength) {
          _length = this.totalPage - i * this.pagingLength
        }
        for (let j = 0; j < _length; ++j) {
          this.pagingGroup[i][j] = {
            index: j,
            text: this.pagingLength * i + j + 1,
            current: false,
            pagingIndex: this.pagingLength * i + j
          }
          if (curIdx === this.pagingLength * i + j) {
            this.groupIndex = i
            this.pagingGroup[i][j].current = true
          }
        }
      }
    }

    draw (groupIdx) {
      let _pagingHTML = ''
      this.pagingGroup[groupIdx].forEach(value => {
        _pagingHTML += `<a href="#" data-index="${value.pagingIndex}">${value.text}</a>`
      })
      this.$pagingList.find('a').off('click')
      this.$pagingList.html('').html(_pagingHTML)
      this.$pagingList.find('a').on('click', e => {
        e.preventDefault()
        let idx = $(e.target).data('index')
        if (idx !== this.offset) {
          this.activePaging(idx)
          this.$paging.triggerHandler({type: 'change', offset: this.offset, total: this.totalPage})
        }
      })
    }

    activePaging (curIdx) {
      this.offset = curIdx || 0
      let _activeIdx = curIdx - this.pagingLength * this.groupIndex
      let _pagingGroup = this.pagingGroup[this.groupIndex]

      this.$paging.find('.paging-prev, .paging-next, .paging-first, .paging-last').prop('disabled', false)
      if (this.groupIndex === 0) {
        this.$paging.find('.paging-prev').prop('disabled', true)
        if (this.offset === 0) {
          this.$paging.find('.paging-first').prop('disabled', true)
        }
        if (this.totalPage === this.pagingGroup[this.groupIndex].length) {
          this.$paging.find('.paging-next').prop('disabled', true)
        } else if (this.totalPage === 1) {
          this.$paging.find('.paging-last').prop('disabled', true)
        }
        if (this.pagingGroup.length === 1 && _activeIdx === _pagingGroup.length - 1) {
          this.$paging.find('.paging-last').prop('disabled', true)
        }
      } else if (this.groupIndex === this.pagingGroup.length - 1) {
        this.$paging.find('.paging-next').prop('disabled', true)
        if (_activeIdx === _pagingGroup.length - 1) {
          this.$paging.find('.paging-last').prop('disabled', true)
        }
      }
      _pagingGroup.forEach((value, index) => {
        if (_activeIdx === index) {
          _pagingGroup[index].current = true
          this.$pagingList.find('a').eq(index).attr('aria-current', 'page').addClass('active')
        } else {
          _pagingGroup[index].current = false
          this.$pagingList.find('a').eq(index).removeAttr('aria-current').removeClass('active')
        }
      })
      // this.$paging.triggerHandler({type: 'change', offset: this.offset, total: this.totalPage})
    }

    clear () {
      this.offset = 0
      this.pagingGroup = []
      this.$paging.find('button, a').off()
      $(window).off('resize-view-type')
    }
  }
})(window.jQuery)
/** ***************************************************************************************************************** */

/** preventScroll.js ****************************************************************************************************** */
;($ => {
  let _plugin = null
  $.extend({
    preventScroll: function (isPrevent) {
      _plugin = _plugin || new PreventScroll()

      let method = isPrevent ? 'add' : 'remove'
      _plugin[method]()

      return _plugin
    }
  })

  class PreventScroll {
    constructor () {
      if ($.util.isMobile()) {
        this.scrollEvent = 'touchmove'
      } else {
        this.scrollEvent = 'wheel'
      }
    }

    preventScrollEventHandler (e) {
      e.preventDefault()
      return false
    }

    add () {
      window.addEventListener(this.scrollEvent, this.preventScrollEventHandler, {passive: false})
      $('body').addClass('prevent-scroll')
    }

    remove () {
      window.removeEventListener(this.scrollEvent, this.preventScrollEventHandler)
      $('body').removeClass('prevent-scroll')
    }
  }
})(window.jQuery)
/** ***************************************************************************************************************** */

/** tab.js ********************************************************************************************************** */
;($ => {
  let pluginName = 'tab'

  $.fn.extend({
    tab: function (options = {}, value) {
      if (typeof options === 'string') {
        $.plugin.call(this, options, value)
      } else {
        this.each((index, el) => {
          if (!$(el).attr('applied-plugin')) {
            $.plugin.add($(el), pluginName, new Tab($(el), options))
          }
        })
      }
      return this
    }
  })

  class Tab {
    constructor ($this, options) {
      this.$tab = $this
      this.$list = this.$tab.find('> .tab-list')
      this.$button = this.$list.find('a, button')
      this.$content = this.$tab.find('> .tab-content')

      this.options = options
      this.activeIndex = (this.options.activeIndex >= 0) ? this.options.activeIndex : 0

      this.init()
    }

    init () {
      this.$list.find('button').on('click', e => {
        let idx = $(e.target).index()
        if (idx === this.activeIndex) return
        this.active(idx)
      })

      if (typeof this.activeIndex === 'number') {
        this.active(this.activeIndex)
      }
    }

    active (idx) {
      let $content = this.$content.find('> .content')
      this.activeIndex = idx

      this.$button.removeClass('active').attr('aria-selected', false)
      this.$button.eq(idx).addClass('active').attr('aria-selected', true)
      $content.prop('hidden', true).removeClass('active')
      $content.eq(idx).prop('hidden', false).addClass('active')

      this.$tab.triggerHandler({type: 'change', activeIndex: this.activeIndex})
    }

    clear () {
      // this.$list.find('button').removeClass('active').attr('aria-selected', false).off('click')
      this.$button.removeClass('active').attr('aria-selected', false).off('click')
      this.$content.find('> .content').removeClass('active').prop('hidden', true)
    }
  }
})(window.jQuery)
/** ****************************************************************************************************************** */

/** textarea.js ********************************************************************************************************** */
;($ => {
  let pluginName = 'textarea'

  $.fn.extend({
    textarea: function (options = {}, value) {
      if (typeof options === 'string') {
        $.plugin.call(this, options, value)
      } else {
        this.each((index, el) => {
          if (!$(el).attr('applied-plugin')) {
            $.plugin.add($(el), pluginName, new Textarea($(el), options))
          }
        })
      }
      return this
    }
  })

  class Textarea {
    constructor ($this, options) {
      this.$textarea = $this.find('textarea')
      this.$current = $this.find('.current-length')
      this.$total = $this.find('.total-length')
      this.value = ''
      this.maxlength = parseInt(this.$textarea.attr('maxlength'))

      this.init()
    }

    init () {
      this.$current.text(this.value.length)
      this.$total.text($.util.commaNumberFormat(this.maxlength))

      this.$textarea.on('keydown keyup', e => {
        let value = e.target.value

        this.value = value
        this.$current.text($.util.commaNumberFormat(value.length))
        if (this.value.length > this.maxlength) {
          this.$textarea.addClass('error')
        } else {
          this.$textarea.removeClass('error')
        }
      })
    }

    clear () {
      this.$current.text(0)
      this.$total.text(0)
      this.value = ''
      this.maxlength = 0
      this.$textarea.off()
    }
  }
})(window.jQuery)
/** ****************************************************************************************************************** */
