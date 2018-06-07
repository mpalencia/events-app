<template>
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button" @click="mobileSidebarToggle">
            &#9776;
        </button>
        <b-link class="navbar-brand" to="#"/>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" @click="sidebarMinimize">&#9776;
        </button>
        <b-navbar-nav class="d-md-down-none">
            <b-nav-item class="px-3">Dashboard</b-nav-item>
            <b-nav-item class="px-3">Users</b-nav-item>
            <b-nav-item class="px-3">Settings</b-nav-item>
        </b-navbar-nav>
        <b-navbar-nav class="ml-auto">
            <b-nav-item class="d-md-down-none">
                <i class="icon-bell"/><span class="badge badge-pill badge-danger">5</span>
            </b-nav-item>
            <b-nav-item class="d-md-down-none">
                <i class="icon-list"/>
            </b-nav-item>
            <b-nav-item class="d-md-down-none">
                <i class="icon-location-pin"/>
            </b-nav-item>
            <b-nav-item-dropdown right>
                <template slot="button-content">
                    <img src="static/img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                    <span class="d-md-down-none">admin</span>
                </template>
                <b-dropdown-header tag="div" class="text-center"><strong>Account</strong></b-dropdown-header>
                <b-dropdown-item><i class="fa fa-bell-o"/> Updates<span class="badge badge-info">42</span>
                </b-dropdown-item>
                <b-dropdown-item><i class="fa fa-envelope-o"/> Messages<span class="badge badge-success">42</span>
                </b-dropdown-item>
                <b-dropdown-item><i class="fa fa-tasks"/> Tasks<span class="badge badge-danger">42</span>
                </b-dropdown-item>
                <b-dropdown-item><i class="fa fa-comments"/> Comments<span class="badge badge-warning">42</span>
                </b-dropdown-item>
                <b-dropdown-header tag="div" class="text-center"><strong>Settings</strong></b-dropdown-header>
                <b-dropdown-item><i class="fa fa-user"/> Profile</b-dropdown-item>
                <b-dropdown-item><i class="fa fa-wrench"/> Settings</b-dropdown-item>
                <b-dropdown-item><i class="fa fa-usd"/> Payments<span class="badge badge-default">42</span>
                </b-dropdown-item>
                <b-dropdown-item><i class="fa fa-file"/> Projects<span class="badge badge-primary">42</span>
                </b-dropdown-item>
                <b-dropdown-divider/>
                <b-dropdown-item><i class="fa fa-shield"/> Lock Account</b-dropdown-item>
                <b-dropdown-item v-on:click="logout"><i class="fa fa-lock"/> Logout</b-dropdown-item>

            </b-nav-item-dropdown>
        </b-navbar-nav>
        <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" @click="asideToggle">&#9776;
        </button>
    </header>
</template>
<script>

    export default {
        name: 'Header',
        methods: {
            sidebarToggle(e) {
                e.preventDefault()
                document.body.classList.toggle('sidebar-hidden')
            },
            sidebarMinimize(e) {
                e.preventDefault()
                document.body.classList.toggle('sidebar-minimized')
            },
            mobileSidebarToggle(e) {
                e.preventDefault()
                document.body.classList.toggle('sidebar-mobile-show')
            },
            asideToggle(e) {
                e.preventDefault()
                document.body.classList.toggle('aside-menu-hidden')
            },
            async logout(e){
                this.$store.dispatch('auth/logout')
            }
        }
    }
</script>
