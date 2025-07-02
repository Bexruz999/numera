<div x-data="{ tab: 'uz' }">
    <div class="btn-group mb-3">
        <button class="btn btn-primary" :class="{ 'active': tab === 'uz' }" @click="tab = 'uz'">Uzbek</button>
        <button class="btn btn-primary" :class="{ 'active': tab === 'ru' }" @click="tab = 'ru'">Russian</button>
    </div>
{{--    <div x-show="tab === 'uz'">--}}
{{--        <!-- Uzbek fields here -->--}}
{{--        @form($uzFields)--}}
{{--    </div>--}}
{{--    <div x-show="tab === 'ru'">--}}
{{--        <!-- Russian fields here -->--}}
{{--        @form($ruFields)--}}
{{--    </div>--}}
{{--</div>--}}
