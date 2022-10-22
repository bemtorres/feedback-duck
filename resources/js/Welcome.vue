<template>
    <h1>Hola</h1>
    <p>{{title}}</p>
    <h3>{{ foo }}</h3>
</template>

<script>
export default {
  props: ['foo'],
  setup: () => ({
      title: 'How To Install Vue 3 in Laravel 9 From Scratch'
  })
}
</script>
