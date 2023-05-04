@props(['items', 'value' => null, 'config' => '{}', 'label' => null, 'grouped' => false])

@php
    $model = $attributes->wire('model')->value();
@endphp
<div wire:ignore x-data="{
    choices: null,
    init() {
        this.$nextTick(() => {
            this.choices = new Choices(this.$refs.select, {
                itemSelectText: '',
                searchResultLimit: 10,
                maxItemCount: 1,
                shouldSort: false,
                shouldSortItems: false,
                ...{{ $config }},
            });

            @if($model)
            Livewire.hook('element.updated', (el, component) => {
                if (component.id !== $wire.__instance.id) return;
                let value = $wire['{{ $model }}']
                this.choices.setChoiceByValue(`${value}`)
            })
            @endif
        });
    }
}">
    <select x-ref="select" {{ $attributes }}
        @if ($model) x-on:change="$wire.set('{{ $model }}', $event.detail.value)" @endif>
        @if ($label)
            <option value="">{{ $label }}</option>
        @endif
        @if ($grouped)
            @foreach ($items as $gl => $item_list)
                <optgroup label="{{ $gl }}">
                    @foreach ($item_list as $v => $l)
                        <option value="{{ $v }}" @selected($value == $v)>
                            {{ $l }}
                        </option>
                    @endforeach
                </optgroup>
            @endforeach
        @else
            @foreach ($items as $v => $l)
                <option value="{{ $v }}" @selected($value == $v)>
                    {{ $l }}
                </option>
            @endforeach
        @endif
    </select>
</div>
