<template>
	<div>
		<a-button type="primary" @click="showModal">
			<CloudDownloadOutlined />
			{{ $t("product.import_products") }}
		</a-button>
		<a-modal v-model:visible="visible" :title="$t('product.import_products')">
			<a-row :gutter="16">
				<a-col :xs="24" :sm="24" :md="24" :lg="24">
					<a-form-item
						:label="$t('common.file')"
						name="file"
						:help="rules.file ? rules.file.message : null"
						:validateStatus="rules.file ? 'error' : null"
					>
						<a-upload
							:accept="'.xlsx,.csv'"
							v-model:file-list="fileList"
							name="file"
							:before-upload="beforeUpload"
							:maxCount="1"
						>
							<a-button :loading="loading">
								<template #icon>
									<UploadOutlined></UploadOutlined>
								</template>
								{{ $t("common.upload") }}
							</a-button>
						</a-upload>
					</a-form-item>
				</a-col>
			</a-row>
			<template #footer>
				<a-button type="primary" :loading="loading" @click="importProducts">
					{{ $t("common.import") }}
				</a-button>
				<a-button key="back" @click="handleCancel">
					{{ $t("common.cancel") }}
				</a-button>
			</template>
		</a-modal>
	</div>
</template>
<script>
import { defineComponent, ref } from "vue";
import { CloudDownloadOutlined, UploadOutlined } from "@ant-design/icons-vue";
import apiAdmin from "../../../../common/composable/apiAdmin";
import UploadFile from "../../../../common/core/ui/file/UploadFile.vue";

export default defineComponent({
	emits: ["onUploadSuccess"],
	components: {
		CloudDownloadOutlined,
		UploadFile,
		UploadOutlined,
	},
	setup(props, { emit }) {
		const { addEditFileRequestAdmin, loading, rules } = apiAdmin();
		const fileList = ref([]);
		const visible = ref(false);

		const beforeUpload = (file) => {
			fileList.value = [...fileList.value, file];
			return false;
		};

		const importProducts = () => {
			const formData = {};
			if (fileList && fileList.value && fileList.value[0] != undefined) {
				formData.file = fileList.value[0];
			}
			console.log(fileList.value[0], formData);

			loading.value = true;

			addEditFileRequestAdmin({
				url: "products/import",
				data: formData,
				successMessage: props.successMessage,
				success: (res) => {
					fileList.value = [];

					// emit("onFileUploaded", {
					// 	file: response.data.file,
					// 	file_url: response.data.file_url,
					// });
				},
			});
		};

		const showModal = () => {
			visible.value = true;
		};

		const handleCancel = (e) => {
			fileList.value = [];
			visible.value = false;
		};

		return {
			fileList,
			rules,
			loading,

			visible,
			showModal,
			handleCancel,
			importProducts,

			beforeUpload,
		};
	},
});
</script>
