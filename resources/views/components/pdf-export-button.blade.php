<div x-data="{
            spinnerIsVisible: false,
            callback_url: '',
            async startExport() {
                this.spinnerIsVisible = true;
                let url = '{{ route('pdf', ['type' => $type]) }}';
                try {
                    const response = await fetch(url);
                    if (!response.ok) {
                      throw new Error(`Response status: ${response.status}`);
                    }

                    const result = await response.json();
                    console.log(result);

                    this.callback_url = result.url;
                    this.poolPDF();
                } catch (error) {
                    console.error(error.message);
                }
            },
            async poolPDF() {
                for (let i = 0; i < 10; i++) {
                    try {
                        const response = await fetch(this.callback_url);

                        if (!response.ok) {
                            throw new Error(`Response status: ${response.status}`);
                        }

                        const result = await response;
                        console.log(result);

                        if (result.ok) {
                            this.spinnerIsVisible = false;

                            window.location.href = result.url;

                            return;
                        }
                    } catch (error) {
                        console.error(error.message);
                    }

                    await new Promise(resolve => setTimeout(resolve, 1000));
                }

                this.spinnerIsVisible = false;
            },
        }" class="d-flex align-items-center gap-2">
    <a @click.prevent="startExport()" href="#" class="btn btn-secondary btn-lg">{{ $label ?? 'Download PDF' }}</a>
    <div x-show="spinnerIsVisible" class="spinner-border" role="status"></div>
</div>
