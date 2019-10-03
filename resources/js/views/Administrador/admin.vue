<template>
<div>
    <v-sheet class="pa-3 m-auto" color="grey lighten-3" elevation="12">
        <v-img src="/images/logo-pq.jpeg" aspect-ratio="1" class="grey lighten-2 m-auto" max-width="300" max-height="300"></v-img>
        <v-form class="p-5" @submit.prevent="login">
            <v-text-field label="Usuario" class="w-75 m-auto p-3" id="email" v-model="email">
            </v-text-field>
            <v-text-field label="Contraseña" class="w-75 m-auto p-3" id="password" v-model="password">
            </v-text-field>
            <v-btn color="success" class="mr-4" block type="submit">Validar</v-btn>
        </v-form>
    </v-sheet>
</div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
      return {
        email: null,
        password: null,
        success: false,
        has_error: false,
        error: ''
      }
    },
    beforeMount() {
        // let dataForm=new FormData();
        // dataForm.append("name","Eder R.C")
        // dataForm.append("email","ederastonmartin@hotmail.com")
        // dataForm.append("password","contraseñaSegura")
        // // dataForm.append("password_confirmation","contraseñaSegura")

        // axios.post("http://127.0.0.1:8000/api/v1/auth/register",dataForm)
        // .then(res => {
        //     console.log(res)
        // })
        // .catch(err => {
        //     console.error(err);
        // })
    },
    methods: {
        login() {
            // get the redirect object
            var redirect = this.$auth.redirect()
            var app = this
            this.$auth.login({
                data: {
                    email: app.email,
                    password: app.password
                },
                success: function () {
                    // handle redirection
                    app.success = true
                    const redirectTo = 'adminPanel'
                    this.$router.push({
                        name: redirectTo
                    })
                },
                error: function () {
                    app.has_error = true
                    app.error = res.response.data.error
                },
                rememberMe: true,
                fetchUser: true
            })
        }
    }
}
</script>
