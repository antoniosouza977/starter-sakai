<script setup>
import {useLayout} from '@/Layouts/composables/layout';
import AppConfigurator from './AppConfigurator.vue';
import {Link, usePage} from "@inertiajs/vue3";
import LogoutButton from "@/Components/Auth/LogoutButton.vue";

const {onMenuToggle, toggleDarkMode, isDarkTheme} = useLayout();

const page = usePage()
</script>

<template>
    <div class="layout-topbar">
        <div class="layout-topbar-logo-container">
            <button class="layout-menu-button layout-topbar-action" @click="onMenuToggle">
                <i class="pi pi-bars"></i>
            </button>
            <a href="/" class="layout-topbar-logo">
                <span>App Name</span>
            </a>
        </div>

        <div class="layout-topbar-actions">
            <div class="layout-config-menu">
                <button type="button" class="layout-topbar-action" @click="toggleDarkMode">
                    <i :class="['pi', { 'pi-moon': isDarkTheme, 'pi-sun': !isDarkTheme }]"></i>
                </button>
                <div class="relative">
                    <button
                        v-styleclass="{ selector: '@next', enterFromClass: 'hidden', enterActiveClass: 'animate-scalein', leaveToClass: 'hidden', leaveActiveClass: 'animate-fadeout', hideOnOutsideClick: true }"
                        type="button"
                        class="layout-topbar-action layout-topbar-action-highlight"
                    >
                        <i class="pi pi-palette"></i>
                    </button>
                    <AppConfigurator/>
                </div>
            </div>

            <button
                class="layout-topbar-menu-button layout-topbar-action"
                v-styleclass="{ selector: '@next', enterFromClass: 'hidden', enterActiveClass: 'animate-scalein', leaveToClass: 'hidden', leaveActiveClass: 'animate-fadeout', hideOnOutsideClick: true }"
            >
                <i class="pi pi-ellipsis-v"></i>
            </button>

            <div class="layout-topbar-menu hidden lg:block">
                <div class="layout-topbar-menu-content">
                    <Link :href="route('profile.edit')">
                        <div>
                            <span class="layout-topbar-action">
                            <i class="pi pi-user"></i>
                            </span>
                            <span class="text-lg">{{ page.props.auth.user.name }}</span>
                        </div>
                    </Link>
                    <LogoutButton/>
                </div>
            </div>
        </div>
    </div>
</template>
