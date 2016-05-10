<template>

    <form class="pk-panel-teaser uk-form uk-form-stacked" v-if="editing">

        <h3>Tip of the Month</h3>

        <div class="uk-form-row">
            <label class="uk-form-label">{{ 'Tip of the Month' | trans }}</label>
            <div class="uk-form-controls uk-form-width-large">
                <input id="stc_tip" class="uk-form-width-large" name="stc_tip" type="file" v-model="config.stc_tip"
                <p class="uk-form-help-block">{{ 'Upload a PDF for this month's tip.' | trans }}</p>
            </div>
        </div>

    </form>

    <div v-else>

        <h3>Tip of the Month</h3>

        <h3 v-if="widget.file">{{ config.tip_of_the_month }}</h3>

    </div>

</template>

<script>

    module.exports = {

        type: {

            id: 'theme-stc-dashboard-totm',
            label: 'Tip of the Month',
            defaults: {
                stc_tip: ''
            }

        },

        replace: false,

        props: ['widget', 'editing'],

        data: function () {
            return _.extend({config: {}}, window.$theme);
        },

        events: {

            save: function() {

                this.$http.post('admin/system/settings/config', {name: this.name, config: this.config}).catch(function (res) {
                    this.$notify(res.data, 'danger');
                });

            }

        }

    };

    window.Dashboard.components.stc = module.exports;

</script>
