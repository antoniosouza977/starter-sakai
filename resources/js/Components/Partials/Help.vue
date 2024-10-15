<script setup>
const props = defineProps({
    text: {
        type: String,
        required: true,
    }
})
</script>

<template>
    <Accordion value="0" class="w-full">
        <AccordionPanel value="1">
            <AccordionHeader>Ajuda</AccordionHeader>
            <AccordionContent>
                <p class="p-3 bg-emphasis rounded-t">
                    {{ text }}
                </p>
            </AccordionContent>
        </AccordionPanel>
    </Accordion>
</template>

<style scoped>

</style>
