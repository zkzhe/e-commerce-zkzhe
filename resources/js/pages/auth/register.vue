<template>
    <section class="form-elegant">
        <mdb-row>
            <div class="d-flex justify-content-center">
                <mdb-col md="5">
                    <mdb-card>
                        <mdb-card-body class="mx-4">
                            <div class="text-center">
                                <h3 class="dark-grey-text mb-5">
                                    <strong>Sign Up</strong>
                                </h3>
                            </div>
                            <mdb-input
                                label="Your name"
                                type="name"
                                v-model="name"
                            />
                            <span
                                class="text text-danger"
                                v-if="error && errors.name"
                                >{{ errors.name[0] }}</span
                            >
                            <mdb-input
                                label="Your email"
                                type="email"
                                v-model="email"
                            />
                            <span
                                class="text text-danger"
                                v-if="error && errors.email"
                                >{{ errors.email[0] }}</span
                            >
                            <mdb-input
                                v-model="password"
                                label="Your password"
                                type="password"
                                containerClass="mb-0"
                            />
                            <span
                                class="text text-danger"
                                v-if="error && errors.password"
                                >{{ errors.password[0] }}</span
                            >
                            <mdb-input
                                v-model="confirmPassword"
                                label="Your confirmPassword"
                                type="password"
                                containerClass="mb-0"
                            />
                            <span
                                class="text text-danger"
                                v-if="error && errors.confirmPassword"
                                >{{ errors.confirmPassword[0] }}</span
                            >
                            <div class="text-center mb-3">
                                <mdb-btn
                                    type="button"
                                    gradient="blue"
                                    rounded
                                    class="btn-block z-depth-1a"
                                    @click="register()"
                                    >Register</mdb-btn
                                >
                            </div>
                            <p
                                class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"
                            >
                                or Sign in with:
                            </p>
                            <div class="row my-3 d-flex justify-content-center">
                                <mdb-btn
                                    type="button"
                                    color="white"
                                    rounded
                                    class="mr-md-3 z-depth-1a"
                                    ><mdb-icon
                                        fab
                                        icon="facebook"
                                        class="blue-text text-center"
                                /></mdb-btn>
                                <mdb-btn
                                    type="button"
                                    color="white"
                                    rounded
                                    class="mr-md-3 z-depth-1a"
                                    ><mdb-icon
                                        fab
                                        icon="twitter"
                                        class="blue-text"
                                /></mdb-btn>
                                <mdb-btn
                                    type="button"
                                    color="white"
                                    rounded
                                    class="z-depth-1a"
                                    ><mdb-icon
                                        fab
                                        icon="google-plus"
                                        class="blue-text"
                                /></mdb-btn>
                            </div>
                        </mdb-card-body>
                        <mdb-modal-footer class="mx-5 pt-3 mb-1">
                        </mdb-modal-footer>
                    </mdb-card>
                </mdb-col>
            </div>
        </mdb-row>
    </section>
</template>

<script>
import {
    mdbRow,
    mdbCol,
    mdbCard,
    mdbCardBody,
    mdbInput,
    mdbBtn,
    mdbIcon,
    mdbModal,
    mdbModalBody,
    mdbModalFooter
} from "mdbvue";
export default {
    name: "FormsPage",
    components: {
        mdbRow,
        mdbCol,
        mdbCard,
        mdbCardBody,
        mdbInput,
        mdbBtn,
        mdbIcon,
        mdbModal,
        mdbModalBody,
        mdbModalFooter
    },
    data() {
        return {
            name: "",
            email: "",
            password: "",
            confirmPassword: "",
            error: false,
            errors: {},
            success: false,
            isProgress: false
        };
    },
    methods: {
        register() {
            this.axios
                .post("/api/auth/register", {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.confirmPassword
                })
                .then(response => {
                    this.isProgress = true;
                    if (response.data.success == true) {
                        setTimeout(() => {
                            this.isProgress = false;
                            this.$router.push({ name: "login" });
                            this.$toaster.success("Sign up successfully...");
                        }, 2000);
                    }
                })
                .catch(error => {
                    this.isProgress = false;
                    this.error = true;
                    this.errors = error.response.data.errors;
                });
        }
    }
};
</script>

<style>
.form-elegant .font-small {
    font-size: 0.8rem;
}

.form-elegant .z-depth-1a {
    -webkit-box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26),
        0 4px 12px 0 rgba(121, 155, 254, 0.25);
    box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26),
        0 4px 12px 0 rgba(121, 155, 254, 0.25);
}

.form-elegant .z-depth-1-half,
.form-elegant .btn:hover {
    -webkit-box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28),
        0 4px 15px 0 rgba(36, 133, 255, 0.15);
    box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28),
        0 4px 15px 0 rgba(36, 133, 255, 0.15);
}
</style>
