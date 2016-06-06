<?php $view->script('user-edit', 'system/user:app/bundle/user-edit.js', ['vue', 'uikit-autocomplete']) ?>
<?php $view->script('user-autocomplete', 'theme:js/autocomplete.js') ?>

<form id="user-edit" class="uk-form uk-form-horizontal" v-validator="form" @submit.prevent="save | valid" v-cloak>

    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
        <div data-uk-margin>

            <h2 class="uk-margin-remove" v-if="user.id">{{ 'Edit User' | trans }}</h2>
            <template v-else>
                <h2 class="uk-margin-remove" v-else>{{ 'Add User' | trans }}</h2>
                <br />
                <div class="uk-form-row">
                    <label for="form-api-id" class="uk-form-label">{{ 'Account Search' | trans }}</label>
                    <!--<div class="uk-autocomplete uk-form" id="autocomplete" data-uk-autocomplete="{source:[{value:'Hamburg'},{value:'New York'},{value:'Moscow'},{value:'Amsterdam'}], delay: 0, minLength: 1}">-->
                    <div class="uk-autocomplete uk-form" id="autocomplete" data-uk-autocomplete='{source:"<?= $view->url()->getStatic('theme:assets/testfile.php') ?>", delay: 0, minLength: 1}'>
                        <input id="form-api-id" class="uk-form-width-medium" type="text" placeholder="Account Search"/>
                    </div>
                    <div id="clickResult" class="uk-margin"></div>
                </div>
            </template>
        </div>
        <div data-uk-margin>

            <a class="uk-button uk-margin-small-right" :href="$url.route('admin/user')">{{ user.id ? 'Close' : 'Cancel' | trans }}</a>
            <button class="uk-button uk-button-primary" type="submit">{{ 'Save' | trans }}</button>

        </div>
    </div>

    <ul class="uk-tab" v-el:tab v-show="sections.length > 1">
        <li v-for="section in sections"><a>{{ section.label | trans }}</a></li>
    </ul>

    <div class="uk-switcher uk-margin" v-el:content>
        <div v-for="section in sections">
            <component :is="section.name" :user="user" :config="config" :form="form"></component>
        </div>
    </div>

</form>
