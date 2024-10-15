<script setup>
import {router} from "@inertiajs/vue3";

const props = defineProps({
    laravelPaginator: {
        type: Object,
        required: true,
    }
})

const onPageChange = (event) => {
    return router.get(window.location.href, {page: event.page + 1});
}
</script>

<template>

    <div v-if="props.laravelPaginator.total > props.laravelPaginator.data.length" class="w-full flex items-center justify-center">
        <Paginator
            :rows="laravelPaginator.per_page"
            :totalRecords="laravelPaginator.total"
            :first="(laravelPaginator.current_page - 1) * laravelPaginator.per_page"
            @page="onPageChange"/>
    </div>

</template>
