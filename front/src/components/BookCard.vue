<template>
  <section>
    <div class="left">
      <h3>{{book.title}}</h3>
      <p>{{book.description}}</p>
    </div>
    <div class="right">
      <button @click="deleteBook()">Delete</button>
    </div>
  </section>
</template>
<script>
export default {
  props:['book'],
  emits:['deleteBook'],
  methods: {
    deleteBook(){
      this.$emit('deleteBook', this.book.id)
    }
  },
};
</script>
<style scoped>
  section {
    margin: 0.5rem auto;
    max-width: 40rem;
    padding: 1rem;
    border-radius: 5px;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
    display: flex;
    justify-content: space-between;
    border-left: 3px solid #0E2EE1;
  }
  .right {
      display: flex;
      justify-content: center;
      align-items: center;
  }
  .right button {
      padding: 0.5rem 1rem;
      cursor: pointer;
      border:none;
      background: #0E2EE1;
      color: #fff;
  }
  .left {
      padding: 10px;
      text-align: left;
  }
  h3 {
      font-weight: 600;
      margin: 0;
  }
</style>