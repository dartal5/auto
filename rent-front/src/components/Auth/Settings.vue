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
                        v-model="userInfo.name"
                        value="12321"
                        label="Name"
                        :rules="reqRule"
                        required
                        ></v-text-field>
                        <v-text-field
                        v-model="userInfo.surname"
                        label="Surname"
                        :rules="reqRule"
                        required
                        ></v-text-field>
                        <v-text-field
                        v-model="userInfo.email"
                        :rules="emailRules"
                        label="E-mail"
                        required
                        ></v-text-field>
                        <v-select
                        :items="driveCats"
                        v-model="userInfo.category"
                        label="Водійське посвідчення"
                        :rules="reqRule"
                        required
                        ></v-select>
                        <v-text-field
                        :items="driveExp"
                        v-model="userInfo.exp"
                        label="Стаж водіння (у роках)"
                        :rules="reqRule"
                        required
                        ></v-text-field>
                        <v-text-field
                        :items="driveExp"
                        v-model="userInfo.expna"
                        label="Стаж водіння без аварій (у роках)"
                        :rules="reqRule"
                        required
                        ></v-text-field>
                                
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn 
                                class="success" 
                                @click.native="onUserInfo"
                                :disabled="!valid2"
                                >
                                Change
                            </v-btn>
                        </v-card-actions>
                    </v-form>

                    <v-form
                        class="pl-3 pr-3"
                        v-model="valid3"
                    >
                         <v-text-field
                            v-model="password"
                            label="New password"
                            :rules="passRules"
                            type="password"
                            required
                        ></v-text-field>
                        <v-text-field
                            v-model="password2"
                            label="Repeat password"
                            :rules="passRules"
                            type="password"
                            required
                        ></v-text-field>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn 
                                class="error" 
                                @click.native="onPassword"
                                :disabled="!valid3"
                                >
                                Change
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
            valid3: true,
            password: '',
            password2: '',
            name: '',
            email: '',
            pass: '',
            surname: ''
        }
    },
    computed: {
        driveCats() {
            return this.$store.state.userInfo.driveCats
        },
        driveExp() {
            return this.$store.state.userInfo.driveExp
        },
        userInfo(){
            console.log(this.$store.state.user.userInfo)
            return this.$store.state.user.userInfo
        }
        
    },
    methods: {
        onUserInfo() {
            const userInfo = {
                action: 'updateInfo',
                name: this.userInfo.name,
                surname: this.userInfo.surname,
                email: this.userInfo.email,
                category: this.userInfo.category,
                exp: this.userInfo.exp,
                expna: this.userInfo.expna
            }

            console.log(userInfo)

            this.$store.dispatch('updateUser', userInfo)
            

            
        },
        onPassword() {
            const password = {
                action : 'updatePass',
                newPass: this.password,
                repeatPass: this.password2
            }
            this.$store.dispatch('updatePass', password)
        }
    }
    
}
</script>
