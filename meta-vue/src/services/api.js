import axios from 'axios'

const api = axios.create({
    baseURL: 'http://api.meta.com/api/v1'
})

export default {
    product() {
        return api.get('/product/list')
    },
    productCreate(data) {
      return api.post('/product/create', data)
    },
    productSearch(data) {
        return api.post('/product/search', data)
    },
    category() {
        return api.get('/category/list')
    },
    categoryCreate(data) {
        return api.post('/category/create', data)
    }
}
