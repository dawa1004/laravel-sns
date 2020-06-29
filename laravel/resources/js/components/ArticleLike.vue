<template>
  <div>
    <button
      type="button"
      class="btn m-0 p-1 shadow-none"
    >
      <i class="fas fa-heart mr-1"
         :class="{'red-text':this.isLikedBy}"
         @click="clickLike"
      />
    </button>
    {{ countLikes }} <!-- dataから受け取ったいいね数表示 -->
  </div>
</template>

<script>
  export default {
    props: {
      initialIsLikedBy: {
        type: Boolean,
        default: false,
      },
      initialCountLikes: {
        type: Number,
        default: 0,
      },
      authorized: {
        type: boolean,
        default: false,
      },
      endpoint: {
        type: String,
      },
    },
    data() {
      return {
        isLikedBy: this.initialIsLikedBy,
        // Bladeから渡されたいいね数が入ったプロパティinitialCountLikesを、いったんデータcountLikesにセット
        countLikes: this.initialCountLikes,
      }
    },
    methods: {
      clickLike() {
        if (!this.authorized) {
          alert('いいね機能はログイン中のみ使用できます')
          return
        }
        this.isLikedBy
        ? this.unlike
        : this.like()
      },
      async like() {
        const response = await axios.put(this.endpoint)

        this.isLikeBy = true
        this.countLikes = response.data.countLikes
      },
      async unlike() {
        const response = await axios.delete(this.endpoint)

        this.isLikedBy = false
        this.countLikes = response.data.countLikes
      },
    },
  }
</script>
