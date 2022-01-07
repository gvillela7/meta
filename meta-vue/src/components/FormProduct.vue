<template>
  <div class="pt-lg-5">
    <h1>Produto</h1>
    <b-form @submit="onSubmit" @reset="onReset" v-if="show">
      <b-form-group
          id="input-group-1"
          label="Nome:"
          label-for="input-1"
      >
        <b-form-input
            id="input-1"
            v-model="form.name"
            placeholder="Nome do produto"
            required
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Marca:" label-for="input-2">
        <b-form-input
            id="input-2"
            v-model="form.brand"
            placeholder="Marca do produto"
            required
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-3" label="Categoria:" label-for="input-3">
        <select v-model="form.category_id" name="category_id" class="form-control">
          <option v-for="category in form.categories" :key="category.id" :value="category.id">{{ category.name }}</option>
        </select>

      </b-form-group>

      <b-form-group id="input-group-4" label="Garantia:" label-for="input-4">
        <select v-model="form.warranty" name="warranty" class="form-control">
          <option v-for="warranty in form.warranty_name" :key="warranty.value" :value="warranty.value">{{ warranty.text }}</option>
        </select>
      </b-form-group>

      <b-form-group id="input-group-5" label="Código:" label-for="input-5">
        <b-form-input
            id="input-5"
            v-model="form.ref"
            placeholder="Código de referencia do produto"
            required
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-6" label="Descrição:" label-for="input-6">
        <b-form-textarea
            id="textarea"
            v-model="form.description"
            placeholder="Descrição..."
            rows="3"
            max-rows="6"
            required
        ></b-form-textarea>
      </b-form-group>
      <b-form-group id="input-group-7" label="Valor:" label-for="input-7">
        <InputMoney v-model="form.price" :options="{ currency: 'BRL' }" />
      </b-form-group>

      <b-button type="submit" variant="primary">Enviar</b-button>
      <b-button type="reset" variant="danger">Limpar</b-button>
    </b-form>
  </div>
</template>

<script>
import InputMoney from './InputMoney'
import api from "@/services/api";
import router from "@/router";
export default {
  name: 'FormProduct',
  components: {InputMoney},
  data() {
    return {
      form: {
        name: '',
        brand: '',
        description: '',
        ref: '',
        is_plus_sale: '1',
        categories: [],
        category_id: null,
        warranty_name: [{ text: 'Sem garantia', value: 'Sem garantia' }, {text: '1 Ano', value: '1 Ano'}, {text: '2 Ano', value: '2 Anos'}],
        warranty: '',
        price: 0,
      },
      show: true
    }
  },
  methods: {
    async getRecord() {
      const result = await api.category();
      this.form.categories = result.data.categories
    },
    async onSubmit(event) {
      event.preventDefault()
      const result = await api.productCreate(this.form)
      if (result) {
        await router.push('/')
      }
    },
    onReset(event) {
      event.preventDefault()
      // Reset our form values
      this.form.name = ''
      this.form.brand = ''
      this.form.category = null
      this.form.warranty = null
      // Trick to reset/clear native browser form validation state
      this.show = false
      this.$nextTick(() => {
        this.show = true
      })
    }
  },
  created() {
    this.getRecord()
  }

}
</script>
