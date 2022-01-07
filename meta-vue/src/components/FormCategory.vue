<template>
  <div class="pt-lg-5">
    <h3>Nova categoria</h3>
    <div role="group">
      <b-form @submit="onSubmit">
        <label for="input-live">Nome da Categoria</label>
        <b-form-input
            id="input-live"
            v-model="form.name"
            :state="nameState"
            aria-describedby="input-live-help input-live-feedback"
            placeholder="Digite o nome da categoria"
            trim
        ></b-form-input>

        <b-form-invalid-feedback id="input-live-feedback">
          Deve conter pelo menos 3 caracteres
        </b-form-invalid-feedback>

      <b-form-checkbox
          id="checkbox-1"
          v-model="form.status"
          name="checkbox-1"
          value="1"
          unchecked-value="true"
      >
        Ativa
      </b-form-checkbox>
      <b-button type="submit" variant="primary">Enviar</b-button>
      <b-button type="reset" variant="danger">Limpar</b-button>
    </b-form>
  </div>
  </div>
</template>

<script>
import api from "@/services/api";
import router from "@/router";

export default {
  name: "FormCategory",
  computed: {
    nameState() {
      return this.form.name.length > 2 ? true : false
    }
  },
  data() {
    return {
      form: {
        name: '',
        status: ''
      }
    }
  },
  methods: {
    async onSubmit(event) {
      event.preventDefault()
      const result = await api.categoryCreate(this.form)
      if (result) {
        await router.push('/')
      }
    }
  }
}
</script>
