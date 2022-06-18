<template>
    <div class="w-2/12 ">
        <SideBare/>
    </div>
    <div>
<div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="action.php">
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Title <span class="text-red-500">*</span></label>
                            <input type="text" class="w-full p-2 border-2 border-gray-300" name="title" id="title" value="" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Description</label>
                            <input type="text" class="w-full p-2 border-2 border-gray-300" name="description" id="description" placeholder="(Optional)">
                        </div>

                        <div class="mb-8">
                            <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label>
                            <textarea name="content" class="border-2 border-gray-500">
                                
                            </textarea>
                        </div>

                        <div class="flex p-1">
                            <select class="p-2 border-2 border-r border-gray-300" name="action">
                                <option>Save and Publish</option>
                                <option>Save Draft</option>
                            </select>
                            <button role="submit" class="p-3 text-white bg-blue-500 hover:bg-blue-400" required>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
</template>

<script>
import SideBare from '../components/admin/SideBare.vue';

export default{
    name: 'BlogView',
    components:{
        SideBare
    }
}

</script>