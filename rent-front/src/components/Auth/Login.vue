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
                   <app-login-form
                    @onSend="onSend"
                   ></app-login-form>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>


<script>
export default {
   methods: {
       onSend(obj){
           console.log(obj)
       }
   }
}
</script>


<style scoped>
</style>

