<template>

    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
        <div data-uk-margin>
            <h2 class="uk-margin-remove">{{ 'Standard Textile Theme Settings' | trans }}</h2>
        </div>
        <div data-uk-margin>
            <button class="uk-button uk-button-primary" type="submit">{{ 'Save' | trans }}</button>
        </div>
    </div>

    <div class="uk-form uk-form-horizontal">

        <div class="uk-form-row">
            <label for="stc_tagline" class="uk-form-label">{{ 'Tagline' | trans }}</label>
            <div class="uk-form-controls uk-form-width-large">
                <input id="stc_tagline" class="uk-form-width-large" name="stc_tagline" type="text" v-model="config.stc_tagline">
                <p class="uk-form-help-block">{{ 'Tagline printed in Header' | trans }}</p>
            </div>
        </div>

        <div class="uk-form-row">
            <label for="stc_copyright" class="uk-form-label">{{ 'Copyright' | trans }}</label>
            <div class="uk-form-controls uk-form-width-large">
                <input id="stc_copyright" class="uk-form-width-large" name="stc_copyright" type="text" v-model="config.stc_copyright">
                <p class="uk-form-help-block">{{ 'Copyright printed in Footer' | trans }}</p>
            </div>
        </div>

        <div class="uk-form-row">
            <label for="stc_phone" class="uk-form-label">{{ 'Phone Number' | trans }}</label>
            <div class="uk-form-controls uk-form-width-large">
                <input id="stc_phone" class="uk-form-width-large" name="stc_phone" type="text" v-model="config.stc_phone">
                <p class="uk-form-help-block">{{ 'Phone Number printed in Footer' | trans }}</p>
            </div>
        </div>

    </div>

</template>

<script>

    module.exports = {

        section: {
            label: 'Theme',
            icon: 'pk-icon-large-brush',
            priority: 15
        },

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

    window.Site.components['site-theme'] = module.exports;

</script>
