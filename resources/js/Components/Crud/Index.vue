<script setup>

const props = defineProps({
    title: {
        type: String,
        required: true,
    }
});

</script>

<template>
    <div class="card">
        <div class="flex flex-wrap items-center mb-3">
            <div class="w-full flex justify-between items-center mb-3">
                <h1 class="text-xl">{{ props.title }}</h1>
                <div class="flex items-center gap-3">
                    <slot name="search-form"/>
                    <slot name="new-btn"></slot>
                </div>
            </div>
            <slot name="content"/>
        </div>
    </div>
</template>

