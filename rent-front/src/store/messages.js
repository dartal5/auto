export default {
    state: {
        message: null,
        isVisibleMsg: false
    },
    mutations: {
        setMessage(state, payload){
            state.message = payload,
            state.isVisibleMsg = true
        },
        clearMessage(state){
            state.message = null
            state.isVisibleMsg = false
        }
    }
}