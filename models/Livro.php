<?php
// representação de 1 registro no DB em forma de classe
class Livro
{
    public $id;
    public $titulo;
    public $autor;
    public $descricao;
    public $ano_de_lancamento;
    public $usuario_id;
    public $imagem;
    public $nota_avaliacoes;
    public $count_avaliacoes;

    //static, chamada sem instanciar um new Livro
    public static function make($item)
    {
        $livro = new self();
        $livro->id = $item['id'];
        $livro->titulo = $item['titulo'];
        $livro->autor = $item['autor'];
        $livro->imagem = $item['imagem'];
        $livro->descricao = $item['descricao'];
        $livro->ano_de_lancamento = $item['ano_de_lancamento'];
        $livro->usuario_id = $item['usuario_id'];
        $livro->nota_avaliacoes = $item['nota_avaliacoes'];
        $livro->count_avaliacoes = $item['count_avaliacoes'];
        return $livro;
    }

    public function query($where, $params)
    {

        $database = new DB(config('database'));

        if ($where) {
            $where = " where $where ";
        }

        $query = $database->query("SELECT 
                            l.id,
                            l.titulo, 
                            l.autor, 
                            l.descricao, 
                            l.ano_de_lancamento,
                            l.imagem, 
                            ifnull(round(sum(a.nota)/5.0), 0) as nota_avaliacoes, 
                            ifnull(count(a.id),0) as count_avaliacoes 
                        from 
                            livros l 
                        left join 
                            avaliacoes a on a.livro_id = l.id
                        $where 
                        group by 
                            l.id, l.titulo, l.autor, l.descricao, l.ano_de_lancamento ", Livro::class, $params);

        return $query;
    }

    public static function get($id)
    {
        $livro = (new self)->query('l.id=:id', ['id' => $id])->fetch();

        return $livro;
    }

    public static function myBooks($usuario_id)
    {
        $myBooks = (new self)->query('l.usuario_id = :usuario_id', ['usuario_id' => $usuario_id])->fetchAll();
        return $myBooks;
    }

    public static function all($filtro = '')
    {
        $allBooks = (new self)->query('titulo like :filtro', ['filtro' => "%$filtro%"])->fetchAll();
        return $allBooks;
    }
}
