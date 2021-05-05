<template>
  <v-app id="inspire">
    <v-app-bar app shrink-on-scroll>
      <v-app-bar-nav-icon> </v-app-bar-nav-icon>
      <v-toolbar-title>
        <img
          class="mr-3 mt-3"
          src="https://raw.githubusercontent.com/Ailend/Cyberhawk/master/img/header-logo.svg"
          height="40"
        />
        Turbine Inspector</v-toolbar-title
      >

      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon>mdi-dots-vertical</v-icon>
      </v-btn>
    </v-app-bar>

    <v-main>
      <v-container class="flex">
        <v-row>
          <v-col v-for="turbine in turbines" :key="turbine.id" cols="4">
            <v-card class="mx-auto" max-width="344">
              <v-img
                v-if="turbine.status === 'Coating Damage'"
                src="https://www.windpowerengineering.com/wp-content/uploads/2019/07/Wind-turbine-1.jpg"
                height="200px"
              ></v-img>

              <v-img
                v-else-if="turbine.status === 'Lightning Strike'"
                src="https://ychef.files.bbci.co.uk/live/624x351/p08qfwt4.jpg"
                height="200px"
              ></v-img>

              <v-img
                v-else-if="
                  turbine.status === 'Lightning Strike and Coating Damage'
                "
                src="https://images.newscientist.com/wp-content/uploads/2013/07/dn23848-1_800.jpg?width=600"
                height="200px"
              ></v-img>

              <v-img
                v-else
                src="https://base.imgix.net/files/base/ebm/machinedesign/image/2019/09/machinedesign_21286_windturbines670628828.png?auto=format&fit=crop&h=432&w=768"
                height="200px"
              ></v-img>

               <v-card-title class="justify-center">Turbine Asset {{ turbine.id }}</v-card-title>

              <v-card-actions class="justify-center">

                <v-icon
                v-if="turbine.status === 'Coating Damage'" medium
              > mdi-alert-box-outline </v-icon>

              <v-icon
                v-else-if="turbine.status === 'Lightning Strike'" medium
              > mdi-flash-outline </v-icon>

              <v-icon
                v-else-if="
                  turbine.status === 'Lightning Strike and Coating Damage'
                " medium
              > mdi-alert-octagram-outline </v-icon>

              <v-icon
                v-else
               medium
              > mdi-check-decagram-outline </v-icon>

                <v-card-subtitle>
                  {{ turbine.status }}
                </v-card-subtitle>
              </v-card-actions>

              <v-btn color="orange lighten-2" text>
                <v-icon dark> mdi-wrench </v-icon>
              </v-btn>

              <v-spacer></v-spacer>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>


<script>
export default {
  data: () => ({
    turbines: [],
  }),
  beforeMount() {
    this.axios.get(`http://127.0.0.1/api/turbines`).then((response) => {
      this.turbines = response.data;
    });
  },
};
</script>
