@extends('layouts.frontend.app')
@section('title','Organisation')
@section('css')
	<style>
		.team-item .bottom {
			padding: 12px 19px 10px;
		}
		i.icofont-mail{
			font-size: xx-large;
		}
		.page-title-area .title-item ul li:before {
			top: 15px!important;
			left: 86px!important;
		}
	</style>
	@endsection
@section('content')
	<div class="page-title-area title-bg-eleven">
	<div class="d-table">
		<div class="d-table-cell">
			<div class="container">
				<div class="title-item">
					<h2>Organisation du parti</h2>
					<ul>
						<li>
							<a href="{{mob_route('welcome')}}">Accueil</a>
						</li>
						<li>
							<span>Organisation</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</div>


	<section class="team-area ptb-100">
		<div class="container">
			<div class="row">
				<h2>Soutien</h2>
				<div class="col-sm-6 col-lg-4">
					<div class="team-item text-center">
						<div class="row">
							<div class="bottom">
								<h3>Emmanuel MACRON</h3>
								<span>Candidat à l’élection Présidentielle</span>
							</div>
							<div class="pull-right">
								<a href="#" target="_blank">
									<i class="icofont-mail"></i>
								</a>
							</div>
						</div>

						<hr>
						<div class="bottom">
                            Président de la République et Fondateur d’EM
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<h2>Parrain</h2>
				<div class="col-sm-6 col-lg-4">
					<div class="team-item text-center">
						<div class="row">
							<div class="bottom">
								<h3>Christophe CASTANER</h3>
								<span>Parrain de la Fédération 1 Million de Marcheurs</span>
							</div>
							<div class="pull-right">
								<a href="#" target="_blank">
									<i class="icofont-mail"></i>
								</a>
							</div>
						</div>

						<hr>
						<div class="bottom">
                            Président du groupe LREM à l’Assemblée Nationale
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<h2>Porte-paroles</h2>
				<div class="col-sm-6 col-lg-4">
					<div class="team-item text-center">
						<div class="row">
							<div class="bottom">
								<h3>Philippe SPITZ</h3>
								<span>Porte-parole de La Fédération 1 Million de Marcheurs</span>
							</div>
							<div class="pull-right">
								<a href="#" target="_blank">
									<i class="icofont-mail"></i>
								</a>
							</div>
						</div>
						<hr>
						<div class="bottom">
                            Attaché Parlementaire du Député Vincent THIEBAUT
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4">
					<div class="team-item text-center">
						<div class="row">
							<div class="bottom">
								<h3>Timothé KIEFFER</h3>
								<span>Porte-parole de La Fédération 1 Million de Marcheurs</span>
							</div>
							<div class="pull-right">
								<a href="#" target="_blank">
									<i class="icofont-mail"></i>
								</a>
							</div>
						</div>
						<hr>
						<div class="bottom">
							Ancien ministre
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<h2>Responsable de Territoires</h2>
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="team-item text-center">
                            <div class="row">
                                <div class="bottom">
                                    <h3>Véronique JASMIN </h3>
                                    <span>Responsable de Territoires pour La Fédération 1 Million de Marcheurs </span>
                                </div>
                                <div class="pull-right">
                                    <a href="#" target="_blank">
                                        <i class="icofont-mail"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="team-item text-center">
                            <div class="row">
                                <div class="bottom">
                                    <h3>Pierre CASTERAS</h3>
                                    <span>Responsable de Territoires pour La Fédération 1 Million de Marcheurs </span>
                                </div>
                                <div class="pull-right">
                                    <a href="#" target="_blank">
                                        <i class="icofont-mail"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="team-item text-center">
                            <div class="row">
                                <div class="bottom">
                                    <h3>Alain Jacques BOURDICHON</h3>
                                    <span>Responsable de Territoires pour La Fédération 1 Million de Marcheurs </span>
                                </div>
                                <div class="pull-right">
                                    <a href="#" target="_blank">
                                        <i class="icofont-mail"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="team-item text-center">
                            <div class="row">
                                <div class="bottom">
                                    <h3>Philippe GERARD</h3>
                                    <span>Responsable de Territoires pour La Fédération 1 Million de Marcheurs </span>
                                </div>
                                <div class="pull-right">
                                    <a href="#" target="_blank">
                                        <i class="icofont-mail"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="team-item text-center">
                            <div class="row">
                                <div class="bottom">
                                    <h3>Jean Marc DEZERT</h3>
                                    <span>Responsable de Territoires pour La Fédération 1 Million de Marcheurs </span>
                                </div>
                                <div class="pull-right">
                                    <a href="#" target="_blank">
                                        <i class="icofont-mail"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
			<div class="row">
				<h2>Pôle Europe/International</h2>
				<div class="col-sm-6 col-lg-4">
					<div class="team-item text-center">
						<div class="row">
							<div class="bottom">
								<h3>Mathieu SPANEK</h3>
								<span>Responsable des relations internationales pour la Fédération 1 Million de Marcheurs</span>
							</div>
							<div class="pull-right">
								<a href="#" target="_blank">
									<i class="icofont-mail"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4">
					<div class="team-item text-center">
						<div class="row">
							<div class="bottom">
								<h3>Baba SOW</h3>
								<span>Responsable des relations internationales pour la Fédération 1 Million de Marcheurs</span>
							</div>
							<div class="pull-right">
								<a href="#" target="_blank">
									<i class="icofont-mail"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<h2>Pôles comité Territoriaux </h2>
				<div class="col-sm-6 col-lg-4">
					<div class="team-item text-center">
						<div class="row">
							<div class="bottom">
								<h3>Anna PERRIER</h3>
								<span>Responsable de création de comités territoriaux pour la Fédération 1 million de Marcheurs</span>
							</div>
							<div class="pull-right">
								<a href="#" target="_blank">
									<i class="icofont-mail"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4">
					<div class="team-item text-center">
						<div class="row">
							<div class="bottom">
								<h3>David LIMOUSIN</h3>
								<span>Responsable de Comités Territoriaux pour la Fédération 1 Million de Marcheurs</span>
							</div>
							<div class="pull-right">
								<a href="#" target="_blank">
									<i class="icofont-mail"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4">
					<div class="team-item text-center">
						<div class="row">
							<div class="bottom">
								<h3>Irène DO SANTOS</h3>
								<span>Responsable de comités Territoriaux pour la Fédération 1 Million de marcheurs</span>
							</div>
							<div class="pull-right">
								<a href="#" target="_blank">
									<i class="icofont-mail"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<h2>Responsable de Pôle événements</h2>
				<div class="col-sm-6 col-lg-4">
					<div class="team-item text-center">
						<div class="row">
							<div class="bottom">
								<h3>Philippe LE LAUSQUE</h3>
								<span>Responsable de Territoires de la Fédération 1 Million de Marcheurs </span>
							</div>
							<div class="pull-right">
								<a href="#" target="_blank">
									<i class="icofont-mail"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4">
					<div class="team-item text-center">
						<div class="row">
							<div class="bottom">
								<h3>Marine LERMUSIEAUX</h3>
								<span>Responsable de Territoires de la Fédération 1 Million de Marcheurs </span>
							</div>
							<div class="pull-right">
								<a href="#" target="_blank">
									<i class="icofont-mail"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<h2>Pôle organisation pour les français de l'étranger</h2>
				<div class="col-sm-6 col-lg-4">
					<div class="team-item text-center">
						<div class="row">
							<div class="bottom">
								<h3>Olivier COUSIN</h3>
								<span>Responsable de l’organisation pour le Pôle de Français de l’étranger</span>
							</div>
							<div class="pull-right">
								<a href="#" target="_blank">
									<i class="icofont-mail"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4">
					<div class="team-item text-center">
						<div class="row">
							<div class="bottom">
								<h3>Carine MONNIER</h3>
								<span>Responsable de l’organisation pour le Pôle de Français de l’étranger</span>
							</div>
							<div class="pull-right">
								<a href="#" target="_blank">
									<i class="icofont-mail"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<h2>Pôle Adhérents</h2>
				<div class="col-sm-6 col-lg-4">
					<div class="team-item text-center">
						<div class="row">
							<div class="bottom">
								<h3>Véronique BOUTIN</h3>
								<span>Responsable de Pôle Adhérents pour La Fédération 1 Million de Marcheurs </span>
							</div>
							<div class="pull-right">
								<a href="#" target="_blank">
									<i class="icofont-mail"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4">
					<div class="team-item text-center">
						<div class="row">
							<div class="bottom">
								<h3>Lina MARTIN</h3>
								<span>Responsable de Pôle Adhérents pour La Fédération 1 Million de Marcheurs </span>
							</div>
							<div class="pull-right">
								<a href="#" target="_blank">
									<i class="icofont-mail"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<h2>Pôle jeunesse</h2>
				<div class="col-sm-6 col-lg-4">
					<div class="team-item text-center">
						<div class="row">
							<div class="bottom">
								<h3>Luc-Axel PERRIER</h3>
								<span>Responsable de Pôle jeunesse pour La Fédération 1 Million de Marcheurs </span>
							</div>
							<div class="pull-right">
								<a href="#" target="_blank">
									<i class="icofont-mail"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4">
					<div class="team-item text-center">
						<div class="row">
							<div class="bottom">
								<h3>Sacha FROISSARD</h3>
								<span>Responsable de Pôle jeunesse pour La Fédération 1 Million de Marcheurs </span>
							</div>
							<div class="pull-right">
								<a href="#" target="_blank">
									<i class="icofont-mail"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4">
					<div class="team-item text-center">
						<div class="row">
							<div class="bottom">
								<h3>Victor BARBE</h3>
								<span>Responsable de Pôle jeunesse pour La Fédération 1 Million de Marcheurs </span>
							</div>
							<div class="pull-right">
								<a href="#" target="_blank">
									<i class="icofont-mail"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

			</div>
            <div class="row">
                <h2>Responsables régionaux</h2>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Sarah PETIT</h3>
                                <span>Responsable régionale pour La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Sommer HOUI</h3>
                                <span>Responsable régionale pour La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Charlotte VERDUN</h3>
                                <span>Responsable régionale pour La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Vincent MONTEGU</h3>
                                <span>Responsable régionale pour La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Pauline SANCHEZ</h3>
                                <span>Responsable régionale pour La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <h2>Pôle Communication</h2>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Bernard MIGNON</h3>
                                <span>Responsable de Pôle communication pour La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Olivier BASSINE</h3>
                                <span>Responsable de Pôle communication pour La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Reine KOUETE</h3>
                                <span>Responsable de Pôle communication pour La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row">
                <h2>Membres du Conseil</h2>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Claire GAILLIOT</h3>
                                <span>Membre du conseil de La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Damien HUMEAU</h3>
                                <span>Membre du conseil de La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Cécile FALLOURD</h3>
                                <span>Membre du conseil de La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Dorian LACOMBE</h3>
                                <span>Membre du conseil de La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Aurore Geoffray</h3>
                                <span>Membre du conseil de La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Patrick GERRY</h3>
                                <span>Membre du conseil de La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Juliette De CAUSANS</h3>
                                <span>Membre du conseil de La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Chantal PHILIPONT</h3>
                                <span>Membre du conseil de La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Nadine Julia BUSTOS</h3>
                                <span>Membre du conseil de La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Hervé HAYET</h3>
                                <span>Membre du conseil de La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Jean-Luc ALLEAU</h3>
                                <span>Membre du conseil de La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Gilles Gayraud</h3>
                                <span>Membre du conseil de La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Alex Perlin Lagnona</h3>
                                <span>Membre du conseil de La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Yves Esquerre</h3>
                                <span>Membre du conseil de La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Albert ETCHUMBA</h3>
                                <span>Membre du conseil de La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Charles FESTIN</h3>
                                <span>Membre du conseil de La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Murielle SANTANA</h3>
                                <span>Membre du conseil de La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Kate RIBAULT</h3>
                                <span>Membre du conseil de La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item text-center">
                        <div class="row">
                            <div class="bottom">
                                <h3>Nathalie CASALE</h3>
                                <span>Membre du conseil de La Fédération 1 Million de Marcheurs  </span>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank">
                                    <i class="icofont-mail"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
		</div>
	</section>
@endsection
