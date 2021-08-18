import { Component } from '@angular/core';
import { Post } from './post';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'meuapp';

  public posts: Post[] = [
    new Post('Joao', 'Meu post', 'Sub Joao', 'joao@gmail.com', 'Minha msg'),
    new Post('Paulo', 'Post do Paulo', 'Sub Paulo', 'paulo@gmail.com', 'Msg do Paulo'),
    new Post('Maria', 'Post da Maria', 'Sub Maria', 'maria@gmail.com', 'Msg da Maria'),
    new Post('Joao', 'Meu post', 'Sub Joao', 'joao@gmail.com', 'Minha msg'),
    new Post('Paulo', 'Post do Paulo', 'Sub Paulo', 'paulo@gmail.com', 'Msg do Paulo'),
    new Post('Maria', 'Post da Maria', 'Sub Maria', 'maria@gmail.com', 'Msg da Maria'),
    new Post('Paulo', 'Post do Paulo', 'Sub Paulo', 'paulo@gmail.com', 'Msg do Paulo'),
    new Post('Maria', 'Post da Maria', 'Sub Maria', 'maria@gmail.com', 'Msg da Maria'),
  ];
}
