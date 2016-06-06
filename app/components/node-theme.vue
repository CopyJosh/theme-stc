<template>

    <div class="uk-form-horizontal">

        <template v-if="node.type === 'page' || node.type === 'case-study'">
            <div class="uk-form-row">
                <span class="uk-form-label">{{ 'Title' | trans }}</span>
                <div class="uk-form-controls uk-form-controls-text">
                    <label><input type="checkbox" v-model="node.theme.stc_title_hide"> {{ 'Hide Title' | trans }}</label>
                </div>
            </div>

            <div class="uk-form-row">
                <label for="form-class" class="uk-form-label">{{ 'CSS Page ID' | trans }}</label>
                <div class="uk-form-controls">
                    <input id="form-class" class="uk-form-width-large" type="text" v-model="node.theme.stc_page_id">
                </div>
            </div>
        </template>

        <template v-else>

            <p>No settings available for this page type.</p>

        </template>

    </div>

</template>

<script>

    module.exports = {

        section: {
            label: 'Theme',
            priority: 90
        },

        props: ['node']

    };

    window.Site.components['node-theme'] = module.exports;

</script>
