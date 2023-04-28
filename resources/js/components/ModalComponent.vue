<template>
    <button v-on:click="hello">Click</button>
</template>

<script>

    import utils from '../utils';
    import VueSimpleAlert from "vue-simple-alert";

    Vue.use(VueSimpleAlert);
    Vue.use(utils);

    export default {

        data: {
        },

        mounted: function() {
        },

        methods: {

            dkjungModalBox: function(type, msg)
            {
                // $alert: typeof VueSimpleAlert.alert;
                // $confirm: typeof VueSimpleAlert.confirm;
                // $prompt: typeof VueSimpleAlert.prompt;
                // $fire: typeof VueSimpleAlert.fire;
            
                var msgbox = this.$alert;

                if (type == 'confirm')
                {
                    msgbox = this.$confirm;
                }

                msgbox(msg);
            }
        }
    }

</script>
