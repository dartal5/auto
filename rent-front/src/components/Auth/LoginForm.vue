<template>
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
        v-model="email"
        :rules="emailRules"
        label="E-mail"
        required
        ></v-text-field>
        <v-select
        :items="driveCats"
        v-model="selectDrive"
        label="Водійське посвідчення"
        single-line
            :rules="reqRule"
        required
        ></v-select>
        <v-select
        :items="driveExp"
        v-model="selectExp"
        label="Стаж водіння (у роках)"
        single-line
        :rules="reqRule"
        required
        ></v-select>
        <v-select
        :items="driveExp"
        v-model="selectExp2"
        label="Стаж водіння без аварій (у роках)"
        single-line
        :rules="reqRule"
        required
        ></v-select>
                
        <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn 
            class="success" 
            @click.native="$emit('onSend', formInfo)"
            :disabled="!valid2"
            >
            Send
            </v-btn>
        </v-card-actions>
    </v-form>
</template>


<script>
export default {
    data() {
        return {
            reqRule: [v => !!v || 'This field is required'],
            emailRules: [
            v => !!v || 'E-mail is required',
            v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
            ],
            valid2: false,
            name: '',
            email: '',
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
        formInfo() {
             const info = {
                name: this.name,
                email: this.email,
                driveCat: this.selectDrive.text,
                driveExp: this.selectExp.text,
                driveExp2: this.selectExp2.text
            }
            
            return info
        }
    }
    
}
</script>
