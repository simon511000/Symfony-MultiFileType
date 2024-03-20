import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["realInput", "summary"];

    files = [];

    add(event) {
        this.files.push(...event.srcElement.files);

        event.srcElement.value = '';

        this.filesChanged();
    }
    
    delete(event) {
        const index = event.params.index;

        this.files.splice(index, 1);

        this.filesChanged();
    }

    filesChanged() {
        this.summaryTarget.innerHTML = "";

        let filesContainer = new DataTransfer;

        this.files.forEach((file, i) => {
            filesContainer.items.add(file);

            const fileItem = document.createElement('div');

            fileItem.innerHTML = `
                <span class="file-name">${file.name}</span>
                <button type="button" class="delete-button" data-action="multifile#delete" data-multifile-index-param="${i}">×</button>
            `;

            this.summaryTarget.appendChild(fileItem);
        });

        this.realInputTarget.files = filesContainer.files;
    }
}