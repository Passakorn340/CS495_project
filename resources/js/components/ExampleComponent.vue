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
                <p class="card-text text-truncate mt-2">
                  {{ info.description }}
                </p>
                <button
                  type="button"
                  class="btn btn-primary"
                  data-bs-toggle="modal"
                  data-bs-target="#staticBackdrop"
                  @click="showHouse(info.id)"
                >
                  Read More
                </button>
              </div>

              <!-- Modal -->
              <div
                class="modal fade"
                id="staticBackdrop"
                data-bs-backdrop="static"
                data-bs-keyboard="false"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
              >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">
                        {{ name }}
                      </h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <img
                        :src="image"
                        class="img-fluid"
                        style="max-height: 200px"
                      />
                    </div>
                    <div class="container my-4">
                      <h3>ข้อมูล</h3>
                      <p>{{ description }}</p>
                    </div>
                    <div class="text-center">
                      <h2><span>ราคาเช่าต่อคืนอิอิ</span> {{ price }}</h2>
                    </div>
                    <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                      >
                        Close
                      </button>
                    </div>
                  </div>
                </div>
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
  methods: {
    showHouse(id) {
      axios.get(`/api/product/show/${id}`).then((data) => {
        (this.id = data.data.id),
          (this.name = data.data.name),
          (this.image = data.data.image),
          (this.price = data.data.price),
          (this.description = data.data.description);
      });
    },
  },
};
</script>
