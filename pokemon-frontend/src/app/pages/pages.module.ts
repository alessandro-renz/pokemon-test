import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';

import { HomeComponent } from './home/home.component';
import { PagesRoutingModule } from './pages-routing.module';
import { ViewComponent } from './view/view.component';
import { PokemonCardComponent } from '../components/pokemon-card/pokemon-card.component';


@NgModule({
  declarations: [
    HomeComponent,
    ViewComponent
  ],
  imports: [
    CommonModule,
    PagesRoutingModule,
    PokemonCardComponent
  ]
})
export class PagesModule { }
