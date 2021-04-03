<template>
    <main>
        <mdb-navbar expand="large" dark color="indigo">
            <mdb-navbar-brand to="/">
                首頁
            </mdb-navbar-brand>
            <mdb-navbar-toggler>
                <mdb-navbar-nav right>
                    <mdb-nav-item href="#" active>Home</mdb-nav-item>
                    <mdb-nav-item href="#">Link</mdb-nav-item>
                    <mdb-nav-item class="disabled" href="#"
                        >Disabled</mdb-nav-item
                    >
                    <mdb-dropdown tag="li" class="nav-item">
                        <mdb-dropdown-toggle
                            tag="a"
                            navLink
                            color="indigo"
                            slot="toggle"
                            waves-fixed
                            >Dropdown</mdb-dropdown-toggle
                        >
                        <mdb-dropdown-menu>
                            <mdb-dropdown-item :to="{ name: 'login' }"
                                >login</mdb-dropdown-item
                            >
                            <mdb-dropdown-item :to="{ name: 'register' }"
                                >Another action</mdb-dropdown-item
                            >
                            <mdb-dropdown-item
                                >Something else here</mdb-dropdown-item
                            >
                        </mdb-dropdown-menu>
                    </mdb-dropdown>
                </mdb-navbar-nav>
            </mdb-navbar-toggler>
        </mdb-navbar>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <router-link to="/" class="navbar-brand" href="#"
                    >Laravel Vue Crud App - TechvBlogs</router-link
                >
                <div class="collapse navbar-collapse">
                    <div class="navbar-nav">
                        <router-link
                            exact-active-class="active"
                            to="/"
                            class="nav-item nav-link"
                            >Home</router-link
                        >
                        <router-link
                            exact-active-class="active"
                            to="/category"
                            class="nav-item nav-link"
                            >Category</router-link
                        >
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <router-view></router-view>
        </div>
    </main>
</template>

<script>
import {
    mdbDropdown,
    mdbDropdownToggle,
    mdbDropdownMenu,
    mdbDropdownItem,
    mdbContainer,
    mdbNavbar,
    mdbNavbarBrand,
    mdbNavbarToggler,
    mdbNavbarNav,
    mdbNavItem
} from "mdbvue";
export default {
    name: "HelloWorld",
    components: {
        mdbNavbar,
        mdbNavbarBrand,
        mdbNavbarToggler,
        mdbNavbarNav,
        mdbNavItem,
        mdbContainer,
        mdbDropdown,
        mdbDropdownToggle,
        mdbDropdownMenu,
        mdbDropdownItem
    }
};
</script>
