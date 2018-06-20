<template>
<v-container grid-list-lg>
        <v-layout row>
            <v-flex md6 offset-md3>
                <v-card>
                    <v-card-title>
                        <h2>
                            My Settings
                        </h2>
                    </v-card-title>
                  <v-form 
                    class="pl-3 pr-3"
                    v-model="valid2"
                    >
                        <v-text-field
                        v-model="name"
                        label="Name"
                        :rules="reqRule"
                        required
                        ></v-text-field>
                        <v-text-field
                        v-model="surname"
                        label="Surname"
                        :rules="reqRule"
                        required
                        ></v-text-field>
                        <v-text-field
                        v-model="pass"
                        label="Password"
                        :rules="passRules"
                        type="password"
                        required
                        ></v-text-field>
                        <v-text-field
                        v-model="email"
                        :rules="emailRules"
                        label="E-mail"
                        required
                        ></v-text-field>
                        <v-select
                        :items="driveCats"
                        v-model="selectDrive"
                        label="Водійське посвідчення"
                        :rules="reqRule"
                        required
                        ></v-select>
                        <v-select
                        :items="driveExp"
                        v-model="selectExp"
                        label="Стаж водіння (у роках)"
                        :rules="reqRule"
                        required
                        ></v-select>
                        <v-select
                        :items="driveExp"
                        v-model="selectExp2"
                        label="Стаж водіння без аварій (у роках)"
                        :rules="reqRule"
                        required
                        ></v-select>
                                
                        <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn 
                            class="success" 
                            @click.native="onRegister"
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
            reqRule: [v => !!v || 'This field is required'],
            passRules: [
                 v => !!v || 'Password is required',
                 v => v.length > 5 || 'Enter at least 6 characters'
            ],
            emailRules: [
                v => !!v || 'E-mail is required',
                v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
            ],
            valid2: false,
            name: '',
            email: '',
            pass: '',
            surname: '',
            selectDrive: null,
            selectExp: null,
            selectExp2: null
        }
    },
    computed: {
        driveCats() {
            return this.$store.state.userInfo.driveCats
        },
        driveExp() {
            return this.$store.state.userInfo.driveExp
        },
        
    },
    methods: {
        onRegister() {
            const user = {
                action: 'register',
                name: this.name,
                surname: this.surname,
                pass: this.pass,
                email: this.email,
                category: this.selectDrive.text,
                exp: this.selectExp.text,
                expna: this.selectExp2.text
            }

            this.$store.dispatch('registerUser', user)
            

            
        }
    }
    
}
</script>
