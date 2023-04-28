/** ProjectRecord.js ************************************************************************************************ */
window.SSG.ProjectRecord = ($ => {
  let $content = $('.contents.section')
  let $viewBtn = $content.find('.project .sub-header a.result')
  let $resultModal = $content.find('.project-modal')

  let page = 1;

  let _this = {
    init (biz_area, gubun) {

      this.biz_area = biz_area;
      this.gubun = gubun;

      this.loadList(page)

      $viewBtn.on('click', e => {
        e.preventDefault()
        this.openModal()
      })
    },
    openModal () {
      $resultModal.modal({clickToClose: false, closedFocus: '.modalBtn.modal'}, (e, $modal) => {
        if (e.type === 'open') {
        } else if (e.type === 'before-close') {
        }
      })
    },
    setPaging (totalLength) {
      if ($resultModal.find('.paging.js-paging').attr('applied-plugin')) {
        return false
      }

      /** paging setting */
      $resultModal.find('.paging.js-paging').paging({
        offset: 0,
        total: totalLength
      }).on('change', e => {
        page = e.offset + 1
        this.loadList(page)
      })
    },
    loadList (page) {
      $.ajax({
        method: 'post',
        // url: '/file/recordList.json',
        url: '/api/projectlist/getItems',
        data: {
          page: page,
          biz_area: this.biz_area,
          gubun: this.gubun
      },
        success: (result) => {
          res = result.data;
          
          if (res.list.data.length > 0) {
            this.appendList(res.list.data);
            this.setPaging(res.list.total);
          }
        }
      })
    },
    appendList (data) {
      let html = ''
      for (let i = 0; i < data.length; ++i) {
        // let from = data[i].from.substring(0, 7)
        // let to = data[i].to.substring(0, 7)

        html += `<tr>
                  <td>${data[i].gubun}</td>
                  <td><span class="name">${data[i].name}</span></td>
                  <td class="pc-only">${data[i].address}</td>
                  <td class="pc-only">${data[i].volumn}</td>
                  <td>${data[i].duration}</td>
                </tr>`
      }

      $resultModal.find('.project table tbody').html('').html(html)
    }
  }

  return _this
})(window.jQuery)
/** ***************************************************************************************************************** */
