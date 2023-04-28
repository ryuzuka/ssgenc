<template>

    <div v-if="flag" class="paging">

        <button v-if="page.current_page == 1" type="button" class="paging-first" disabled><span class="blind">처음</span></button>
        <button v-else v-on:click="getResults()" type="button" class="paging-first"><span class="blind">처음</span></button>

        <button v-if="this.page.current_page == 1" type="button" class="paging-prev" disabled><span class="blind">이전</span></button>
        <button v-else v-on:click="getResults(page.current_page-1)" type="button" class="paging-prev"><span class="blind">이전</span></button>

        <div v-for="(p, i) in items" v-bind:key="p" class="paging-list">

            <a v-if="(i+page.from) == page.current_page"
                        class="active" aria-current="page">{{i+page.from}}</a>
            <a v-else v-on:click="getResults(i+page.from)">{{i+page.from}}</a>

        </div>

        <button v-if="page.current_page == page.last_page"
            type="button" class="paging-next" disabled><span class="blind">다음</span>
        </button>
        <button v-else v-on:click="getResults(page.current_page+1)"
            type="button" class="paging-next" disabled><span class="blind">다음</span>
        </button>

        <button v-if="page.current_page == page.last_page"
            type="button" class="paging-last" disabled><span class="blind">마지막</span>
        </button>
        <button v-else v-on:click="getResults(page.last_page)"
            type="button" class="paging-last" disabled><span class="blind">마지막</span>
        </button>

    </div>

</template>

<script>

    import utils from '../utils';
    import VueSimpleAlert from "vue-simple-alert";

    Vue.use(VueSimpleAlert);
    Vue.use(utils);

    export default {

        data: {
            // Our data object that holds the Laravel paginator data
            items: '',
            page: '',
            flag: false
        },

        mounted: function() {
            // Fetch initial results
            this.getResults();
        },

        methods: {
            // Our method to GET results from a Laravel endpoint
            getResults: function(page = 1)
            {
                axios.get(utils.getBaseUrl('/api/paginate/project'), {
                    params:{
                        page: page
                    }
                })
                .then(response => {
                    this.page = response.data;
                    this.items = response.data.data;

                    console.log('this.page => ' + JSON.stringify(this.items));

                    this.flag = true;
                    this.$forceUpdate();
                });
            }
        }

    }

// {
//   "current_page": 2,
//   "data": [
//     {
//       "id": 11,
//       "area": "01",
//       "biz_area": "02",
//       "faci_gubun": "03",
//       "project_nm": "project_26",
//       "main_yn": "Y",
//       "open_yn": "Y",
//       "from": "2021-12-22",
//       "to": "2021-12-22",
//       "created_id": "tester",
//       "updated_id": "tester",
//       "created_at": "2021-12-22T08:00:39.000000Z",
//       "updated_at": "2021-12-22T08:00:39.000000Z"
//     },
//     {
//       "id": 12,
//       "area": "01",
//       "biz_area": "02",
//       "faci_gubun": "03",
//       "project_nm": "project_53",
//       "main_yn": "Y",
//       "open_yn": "Y",
//       "from": "2021-12-22",
//       "to": "2021-12-22",
//       "created_id": "tester",
//       "updated_id": "tester",
//       "created_at": "2021-12-22T08:00:39.000000Z",
//       "updated_at": "2021-12-22T08:00:39.000000Z"
//     }
//   ],
//   "first_page_url": "http://ssgenc.test/api/pagenate/project?page=1",
//   "from": 11,
//   "last_page": 3,
//   "last_page_url": "http://ssgenc.test/api/pagenate/project?page=3",
//   "links": [
//     {
//       "url": "http://ssgenc.test/api/pagenate/project?page=1",
//       "label": "이전",
//       "active": false
//     },
//     {
//       "url": "http://ssgenc.test/api/pagenate/project?page=1",
//       "label": "1",
//       "active": false
//     },
//     {
//       "url": "http://ssgenc.test/api/pagenate/project?page=2",
//       "label": "2",
//       "active": true
//     },
//     {
//       "url": "http://ssgenc.test/api/pagenate/project?page=3",
//       "label": "3",
//       "active": false
//     },
//     {
//       "url": "http://ssgenc.test/api/pagenate/project?page=3",
//       "label": "다음",
//       "active": false
//     }
//   ],
//   "next_page_url": "http://ssgenc.test/api/pagenate/project?page=3",
//   "path": "http://ssgenc.test/api/pagenate/project",
//   "per_page": 10,
//   "prev_page_url": "http://ssgenc.test/api/pagenate/project?page=1",
//   "to": 20,
//   "total": 30
// }

</script>
