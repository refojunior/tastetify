<template>
    <div>
        <div v-if="$page.props.flash.error" style="margin-top:79px" class="alert alert-danger mb-0" role="alert">
            {{ $page.props.flash.error }}
        </div>
    </div>
</template>

<script>
export default {
    
}
</script>