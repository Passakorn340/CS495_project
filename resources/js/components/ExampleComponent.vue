<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="row">
          <div class="col" v-for="info in homestay" :key="info.id">
            <div class="card" style="width: 18rem height: 200px">
              <img :src="info.image" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">{{ info.name }}</h5>
                <p class="card-text">
                  {{ info.description }}
                </p>
                <div class="btn btn-info">Read more</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      homestay: [],
      Id: "",
      name: "",
      image: "",
      price: "",
      description: "",
    };
  },
  mounted() {
    axios
      .get("/api/product")
      .then((data) => {
        this.homestay = data.data;
      })
      .catch((err) => console.log(err));
  },
};
</script>
