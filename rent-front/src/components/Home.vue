<template>
  <v-container grid-list-lg fluid>
    <v-layout row wrap>
      <v-flex
        v-for="car in cars"
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
            </div>
          </v-card-title>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn :to="'/car/' + car.id" color="success">Замовити</v-btn>
          </v-card-actions>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  computed: {
    cars () {
      const filterObj = this.$route.query
      let cars = this.$store.getters.cars
      if(Object.keys(filterObj).length !== 0){
        cars = cars.filter(item => {
          for(let value in filterObj){
            if( filterObj[value] !== null && filterObj[value] !== item[value]){
              return false
            }
          }
          return true
        })
      }


      return cars
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
</style>
