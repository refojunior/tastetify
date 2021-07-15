<template>
    <div>
        <div v-if="$page.props.flash.message" class="alert alert-danger" role="alert">
            {{ $page.props.flash.message }}
        </div>
    </div>
</template>

<script>
export default {
    
}
</script>