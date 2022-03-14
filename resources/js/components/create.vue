<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="crad">
          <form @submit.stop.prevent="addHome">
            <label for="Homename">Home</label>
            <input
              class="form-control"
              type="text"
              placeholder="Home Stay"
              id="Homename"
              v-model="name"
              required
            /><label for="image">Image</label>
            <input
              class="form-control"
              type="text"
              placeholder="Image"
              id="image"
              v-model="image"
              required
            />
            <label for="image">Price</label>
            <input
              class="form-control"
              type="text"
              placeholder="Image"
              id="image"
              v-model="image"
              required
            />
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

