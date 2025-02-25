<script>

</script>

<template>
    <div>
        <div class="row g-3 align-items-center mb-4">
            <div class="col-auto">
                <label for="zipSearch" class="col-form-label">Filter By Zip Code</label>
            </div>
            <div class="col-auto">
                <input type="text" id="zipSearch" class="form-control" v-model="zipCode" />
            </div>
            <div class="col-auto">
                <button class="btn btn-primary" @click="fetchProperties">Search</button>
            </div>

        </div>

        <table class="table">
            <thead>
            <tr>
                <th>Status</th>
                <th>List Price</th>
                <th>Beds</th>
                <th>Baths</th>
                <th>Sq. Ft.</th>
                <th>Zip</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="property in properties" :key="property.id">
                <td>{{ property.status }}</td>
                <td>{{ property.list_price }}</td>
                <td>{{ property.beds }}</td>
                <td>{{ property.baths }}</td>
                <td>{{ property.sq_ft }}</td>
                <td>{{ property.zip }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>

</style>
