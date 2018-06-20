<template>
    <v-container grid-list-lg>
        <v-layout row>
            <v-flex md6 offset-md3>
                <v-card>
                    <v-card-title>
                        <h2>
                            Login
                        </h2>
                    </v-card-title>
                  <v-form 
                        class="pl-3 pr-3"
                        v-model="valid2"
                    >
                        <v-text-field
                        v-model="email"
                        :rules="emailRules"
                        label="E-mail"
                        required
                        ></v-text-field>
                        <v-text-field
                        v-model="pass"
                        label="Password"
                        :rules="passRules"
                        type="password"
                        required
                        ></v-text-field>
                                
                        <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn 
                            class="success" 
                            @click.native="onLogin"
                            :disabled="!valid2"
                            >
                            Send
                            </v-btn>
                        </v-card-actions>
                    </v-form>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>




<script>
export default {
    data() {
        return {
            passRules: [
                 v => !!v || 'Password is required',
                 v => v.length > 5 || 'Enter at least 6 characters'
            ],
            emailRules: [
                v => !!v || 'E-mail is required',
                v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
            ],
            valid2: false,
            email: '',
            pass: ''
        }
    },
    computed: {
       
        
    },
    methods: {
        onLogin() {
            const query = {
                action: 'login',
                pass: this.pass,
                email: this.email
            }

            this.$store.dispatch('loginUser', query)
            

            
        }
    }
    
}
</script>
