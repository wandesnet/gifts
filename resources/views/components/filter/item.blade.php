<div>
    <x-select label="{{ $label }}"
              placeholder="{{ $placeholder }}"
              :async-data="[
                  'api'    => route('api.search.item'),
                  'params' => ['active' => $active],
              ]"
              option-label="name"
              option-value="id"
              {{ $attributes }}
    />
</div>
