/** Project.js ******************************************************************************************************** */
window.SSG.Project = ($ => {
  let $content = $('.contents.section')
  let $tab = $content.find('.tab.js-tab')
  let $dropdown = $content.find('.dropdown.js-dropdown')
  let $projectList = $content.find('.project .content')

  let projectList = []
  let projectListIndex = []

  let _this = {
    init () {
      this.typeIndex = 0

      this.setProject()
    },
    setProject () {
      $.switchUI.init($.viewType)
      $tab.on('change-tab', (e, activeIdx) => this.changeProjectType(activeIdx))
      $dropdown.on('change-dropdown', (e, activeIdx) => this.changeProjectType(activeIdx))
    },
    changeProjectType (typeIndex) {
      this.typeIndex = typeIndex

      // change
      // console.log('typeIndex: ', this.typeIndex)
    }
  }

  return _this
})(window.jQuery)
/** ***************************************************************************************************************** */
