<template>
  <section>
    <header>
      <h1>My books - {{ getAppMode() }}</h1>
    </header>
    <book-form @book-added="addBook"></book-form>
    <ul>
      <book-card v-for="book of books" :key="book.id" :book='book' @deleteBook='removeBook'></book-card>
    </ul>
  </section>
</template>

<script>
import BookForm from './components/BookForm.vue';
import axios from 'axios';
const url = process.env.VUE_APP_API_URL;
export default {
  components: { BookForm },
  data() {
    return {
      books: []    
    };
  },
  methods: {
    getAppMode() {
      return process.env.VUE_APP_MODE
    },
    getBooks() {
      axios.get(url + "/api/books").then(res=>{
        console.log(res.data);
        this.books = res.data;
      });
    },
    addBook(title,description){
      let newBook={
        title: title,
        description: description,
      }
      axios.post(url + "/api/books", newBook).then((res)=>{
        this.books = res.data.data;
        console.log(res.data.data);
        this.getBooks();
      })
    },
    removeBook(id) {
      axios.delete(url + "/api/books/" + id).then(()=>{
        for (let book of this.books) {
          let index = this.books.indexOf(book);
          if (book.id === id) {
            this.books.splice(index, 1);
          }
        }
      });
    },
  },
  mounted() {
    this.getBooks();
  },
};
</script>

<style>
:root {
  --main-color: #3a2dfc;
}

* {
  box-sizing: border-box;
}

html {
  font-family: sans-serif;
}

body {
  margin: 0;
}

header {
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
  margin: 3rem auto;
  border-radius: 10px;
  padding: 1rem;
  background-color: var(--main-color);
  color: white;
  text-align: center;
  width: 90%;
  max-width: 40rem;
}

ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

button {
  cursor: pointer;
  border: 1px solid var(--main-color);
  background-color: var(--main-color);
  color: white;
  padding: 0.5rem 1rem;
  box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.26);
}

button:hover,
button:active {
  box-shadow: 1px 2px 6px rgba(0, 0, 0, 0.26);
}
</style>