set ts=3  " set tabstop=3 size of a hard tabstop
set sw=3  " set shiftwidth=3 size of an indent
set sts=3 " set softtabstop=3
set et    " set expandtab always uses spaces instead of tab characters
set tw=80 " set textwidth=80
set nu    " set number
syn on    " syntax on
set relativenumber
"set listchars=eol:¬,tab:>·,trail:~,extends:>,precedes:<,space:␣
set listchars=eol:¬
set listchars+=tab:..
set listchars+=trail:~
set listchars+=extends:>
set listchars+=precedes:<
set list

" Help in this urls
" https://stackoverflow.com/questions/1562633/setting-vim-whitespace-preferences-by-filetype
" https://stackoverflow.com/questions/158968/changing-vim-indentation-behavior-by-file-type
" http://vim.wikia.com/wiki/Indenting_source_code
" autocmd Filetype html setlocal tabstop=2 shiftwidth=2 expandtab
au Filetype html setl ts=2 et sw=2 sts=2
au Filetype javascript setl ts=4 et sw=4 sts=4
au Filetype typescript setl ts=4 et sw=4 sts=4
au Filetype php setl ts=4 et sw=4 sts=4
