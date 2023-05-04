<div wire:ignore x-data="{
    value: @entangle($attributes->wire('model')),
    init() {
        this.pickr = flatpickr(this.$refs.picker, {
            altInput: true,
            altFormat: 'l d F Y',
            static: true,
        })
        this.$watch('value', function(newValue) {
            this.pickr.setDate(newValue);
        }.bind(this));
    },
}" class="mt-[30px] flex flex-col">
    <label for="date" class="mb-2.5 text-base font-semibold text-dark"></label>
    <input type="text" name="date" id="date"
        class="flex w-full appearance-none items-center justify-between rounded-[3px] border border-lightText p-2 text-base text-dark shadow-[inset_0_1px_4px_0_#00000036]"
        x-ref="picker" required>
</div>
