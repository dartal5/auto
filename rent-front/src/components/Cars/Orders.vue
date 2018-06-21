<template>
  <v-container grid-list-lg fluid>
    <v-layout row wrap>
      <v-flex
        v-for="car in myCars"
        :key="car.id"
        md3
      >
        <v-card>
          <v-card-media :src="car.picture" height="200px">
          </v-card-media>
          <v-card-title primary-title>
            <div>
              <h3 class="">{{ car.make + ' ' + car.model }}</h3>
              <div>{{ car.info }}</div>
              <div class="order-date">
                Date of the lease:
              </div>
              <div>{{ car.from_date + ' - ' + car.to_date }}</div>
            </div>
          </v-card-title>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn :to="'/car/' + car.id" color="success">Open</v-btn>
          </v-card-actions>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  computed: {
    myCars () {
        return this.$store.state.cars.userCars
    }
  }
}
</script>




<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
.order-date{
  margin-top: 15px;
  font-weight: bolder;
}
</style>
