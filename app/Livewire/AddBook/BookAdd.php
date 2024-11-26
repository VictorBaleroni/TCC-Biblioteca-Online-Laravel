<?php

namespace App\Livewire\AddBook;

use Livewire\Component;
use App\Models\Book;
use Livewire\WithFileUploads;

class BookAdd extends Component
{
    use WithFileUploads;

    public $bookName;
    public $bookAutor;
    public $bookdescricao;
    public $bookCapa;
    public $typeArq = 'isPdf';
    public $bookFile;
    
    public function saveBook(){
        $this->validate([ 
            'bookName' => 'required',
            'bookAutor' => 'required',
            'bookdescricao' => 'required',
            'bookCapa' => 'required|image|max:5024', 
            'bookFile' => 'required|file|max:40240'
        ],[
            'bookName.required' => 'Nome do livro não informado!',
            'bookAutor.required' => 'Nome do autor não informado!',
            'bookdescricao.required' => 'decrição não informada!',
            'bookCapa.required' => 'Capa do livro não encontrada!',
            'bookCapa.image' => 'O arquivo deve ser uma JPG ou PNG!',
            'bookCapa.max' => 'Imagem muito grande!',
            'bookFile.required' => 'Livro não encontrado!',
            'bookFile.image' => 'O arquivo deve ser uma PDF ou Epub!',
            'bookFile.max' => 'arquivo grande demais!',
        ]);

        $saveCapa = $this->bookCapa->store('images','public');

        $mimeType = $this->bookFile->getMimeType();
        if($this->typeArq === 'isEpub' && $mimeType === 'application/epub+zip'){
            $saveFile = $this->bookFile->store('Books','public');
        }elseif($this->typeArq === 'isPdf' && $mimeType === 'application/pdf'){
            $saveFile = $this->bookFile->store('Books','public');
        }else{
            return session()->flash('typeArqError', 'Tipo de arquivo invalido!');
        }

           Book::create([
            'nome' => $this->bookName,
            'autor' => $this->bookAutor,
            'descricao' => $this->bookdescricao,
            'capa' => $saveCapa,
            'tipoLivro' => $this->typeArq,
            'livro' =>$saveFile
           ]);

        $this->reset('bookName','bookAutor','bookdescricao','bookCapa','typeArq','bookFile');
    }

    public function render()
    {
        return view('livewire.add-book.book-add');
    }
}