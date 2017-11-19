<?php

function create_thisday_box() {
	echo '<div class="this-day">';
	echo '<div class="dd-content">';
	echo '<div class="picture">';
	echo '<img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4Ij4KPGc+Cgk8ZWxsaXBzZSBzdHlsZT0iZmlsbDojRjREQkMzOyIgY3g9IjE1NC4xNTQiIGN5PSIyNjYuNTMzIiByeD0iMzUuMjkyIiByeT0iMzUuMTcxIi8+Cgk8ZWxsaXBzZSBzdHlsZT0iZmlsbDojRjREQkMzOyIgY3g9IjM1Ny44NDYiIGN5PSIyNjYuNTMzIiByeD0iMzUuMjkyIiByeT0iMzUuMTcxIi8+CjwvZz4KPHBhdGggc3R5bGU9ImZpbGw6IzgwODA4MDsiIGQ9Ik03Ni40NjgsNTEyYy02LjYxLDAtMTEuOTY5LTUuMzM5LTExLjk2OS0xMS45Mjh2LTQxLjc0OWMwLTM4LjE0NywzMS4xNDEtNjkuMTgzLDY5LjQyLTY5LjE4MyAgaDI0NC4xNjNjMzguMjc5LDAsNjkuNDIsMzEuMDM0LDY5LjQyLDY5LjE4M3Y0MS43NDhjMCw2LjU4OC01LjM1OSwxMS45MjgtMTEuOTY5LDExLjkyOEg3Ni40NjhWNTEyeiIvPgo8cGF0aCBzdHlsZT0ib3BhY2l0eTowLjE7ZW5hYmxlLWJhY2tncm91bmQ6bmV3ICAgIDsiIGQ9Ik0xMDkuNDA2LDUwMC4wNzJ2LTQxLjc0OWMwLTM4LjE0NywzMS4xNDEtNjkuMTgzLDY5LjQyLTY5LjE4M2gtNDQuOTA4ICBjLTM4LjI3OSwwLTY5LjQyLDMxLjAzNC02OS40Miw2OS4xODN2NDEuNzQ4YzAsNi41ODgsNS4zNTksMTEuOTI4LDExLjk2OSwxMS45MjhoNDQuOTA4ICBDMTE0Ljc2NSw1MTIsMTA5LjQwNiw1MDYuNjYxLDEwOS40MDYsNTAwLjA3MnoiLz4KPGc+Cgk8Y2lyY2xlIHN0eWxlPSJmaWxsOiNFRjY0NUU7IiBjeD0iMjU2IiBjeT0iNDUxLjEwMyIgcj0iMTMuNDczIi8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRUY2NDVFOyIgZD0iTTI2OS40NzQsNTAzLjkxNmMwLTcuNDQyLTYuMDMyLTEzLjQ3NC0xMy40NzQtMTMuNDc0cy0xMy40NzQsNi4wMzItMTMuNDc0LDEzLjQ3NCAgIGMwLDMuMDM4LDEuMDE4LDUuODMxLDIuNzEzLDguMDg0aDIxLjUyMkMyNjguNDU2LDUwOS43NDYsMjY5LjQ3NCw1MDYuOTUzLDI2OS40NzQsNTAzLjkxNnoiLz4KPC9nPgo8cGF0aCBzdHlsZT0iZmlsbDojNjY2NjY2OyIgZD0iTTMwMS44MSw1MTJ2LTg1LjY5M2MwLTQuNDY0LTMuNjItOC4wODQtOC4wODQtOC4wODRjLTQuNDY1LDAtOC4wODQsMy42Mi04LjA4NCw4LjA4NFY1MTJIMzAxLjgxeiIvPgo8cGF0aCBzdHlsZT0iZmlsbDojRUY2NDVFOyIgZD0iTTM0OC45NDMsMzcyLjY5NGMwLDEzLjgzNC0xMS4yNTQsMjUuMDQ5LTI1LjEzNiwyNS4wNDlIMTg4LjE5MyAgYy0xMy44ODMsMC0yNS4xMzYtMTEuMjE1LTI1LjEzNi0yNS4wNDlsMCwwYzAtMTMuODM0LDExLjI1NS0yNS4wNSwyNS4xMzYtMjUuMDVoMTM1LjYxMyAgQzMzNy42ODksMzQ3LjY0NCwzNDguOTQzLDM1OC44NiwzNDguOTQzLDM3Mi42OTRMMzQ4Ljk0MywzNzIuNjk0eiIvPgo8cGF0aCBzdHlsZT0ib3BhY2l0eTowLjE7ZW5hYmxlLWJhY2tncm91bmQ6bmV3ICAgIDsiIGQ9Ik0xODUuNDUsMzcyLjY5NGMwLTEzLjgzNCwxMS4yNTQtMjUuMDUsMjUuMTM2LTI1LjA1aC0yMi4zOTIgIGMtMTMuODgzLDAtMjUuMTM2LDExLjIxNS0yNS4xMzYsMjUuMDVjMCwxMy44MzQsMTEuMjU1LDI1LjA0OSwyNS4xMzYsMjUuMDQ5aDIyLjM5MkMxOTYuNzAzLDM5Ny43NDQsMTg1LjQ1LDM4Ni41MjgsMTg1LjQ1LDM3Mi42OTQgIHoiLz4KPGc+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDg0RTRFOyIgZD0iTTMwMy44MTIsMzg5Ljk2YzE2Ljc1MSwxNi42OTIsMjMuOTMsMzYuNjAzLDE2LjAzNyw0NC40N2MtNy44OTUsNy44NjYtMjcuODczLDAuNzEzLTQ0LjYyMy0xNS45ODIgICBjLTE2Ljc1LTE2LjY5NC0yMy45My0zNi42MDMtMTYuMDM3LTQ0LjQ3MUMyNjcuMDg0LDM2Ni4xMSwyODcuMDYzLDM3My4yNjcsMzAzLjgxMiwzODkuOTZ6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDg0RTRFOyIgZD0iTTIzNi43NzQsNDE4LjQ0OGMtMTYuNzUxLDE2LjY5NC0zNi43MjgsMjMuODQ4LTQ0LjYyMywxNS45ODIgICBjLTcuODk0LTcuODY3LTAuNzE1LTI3Ljc3NywxNi4wMzYtNDQuNDdjMTYuNzUxLTE2LjY5NCwzNi43MjgtMjMuODUsNDQuNjIzLTE1Ljk4MyAgIEMyNjAuNzA0LDM4MS44NDUsMjUzLjUyNCw0MDEuNzU0LDIzNi43NzQsNDE4LjQ0OHoiLz4KPC9nPgo8Zz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNCQTNDM0M7IiBkPSJNMjg4LjQ3Myw0MTEuMjQ1Yy0yLjA2NSwwLTQuMTI4LTAuNzg2LTUuNzA2LTIuMzU4bC0yOS4yODQtMjkuMTgzICAgYy0zLjE2My0zLjE1MS0zLjE3MS04LjI3LTAuMDItMTEuNDMyYzMuMTUyLTMuMTY0LDguMjctMy4xNzEsMTEuNDMyLTAuMDJsMjkuMjg0LDI5LjE4M2MzLjE2MywzLjE1MSwzLjE3MSw4LjI3LDAuMDIsMTEuNDMyICAgQzI5Mi42MjEsNDEwLjQ1MiwyOTAuNTQ3LDQxMS4yNDUsMjg4LjQ3Myw0MTEuMjQ1eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6I0JBM0MzQzsiIGQ9Ik0yMjMuNTI3LDQxMS4yNDVjLTIuMDc0LDAtNC4xNDctMC43OTMtNS43MjYtMi4zNzhjLTMuMTUxLTMuMTYyLTMuMTQzLTguMjgxLDAuMDItMTEuNDMyICAgbDI5LjI4My0yOS4xODNjMy4xNjEtMy4xNTEsOC4yOC0zLjE0NCwxMS40MzIsMC4wMmMzLjE1MSwzLjE2MiwzLjE0Myw4LjI4MS0wLjAyLDExLjQzMmwtMjkuMjgzLDI5LjE4MyAgIEMyMjcuNjU1LDQxMC40NTksMjI1LjU5LDQxMS4yNDUsMjIzLjUyNyw0MTEuMjQ1eiIvPgo8L2c+CjxwYXRoIHN0eWxlPSJmaWxsOiNGRkU3Q0M7IiBkPSJNMzY5Ljk4NiwyNzcuMjkzYzAsNTQuNjk0LTU2Ljc2Niw5OS4wMzMtMTExLjY0Nyw5OS4wMzNoLTQuNjc3ICBjLTU0Ljg4MSwwLTExMS42NDctNDQuMzM5LTExMS42NDctOTkuMDMzdi02Ny41NzZjMC01NC42OTQsNDQuNDktOTkuMDMyLDk5LjM3Mi05OS4wMzJoMjkuMjI4ICBjNTQuODgyLDAsOTkuMzcyLDQ0LjMzOCw5OS4zNzIsOTkuMDMyVjI3Ny4yOTN6Ii8+CjxwYXRoIHN0eWxlPSJvcGFjaXR5OjAuMTtlbmFibGUtYmFja2dyb3VuZDpuZXcgICAgOyIgZD0iTTE2NC4zNzksMjc3LjI5M3YtNjcuNTc2YzAtNTQuNjk0LDQ0LjQ5LTk5LjAzMiw5OS4zNzItOTkuMDMyaC0yMi4zNjUgIGMtNTQuODgyLDAtOTkuMzcyLDQ0LjMzOC05OS4zNzIsOTkuMDMydjY3LjU3NmMwLDU0LjY5NCw1Ni43NjYsOTkuMDMzLDExMS42NDcsOTkuMDMzaDQuNjc3YzIuOTIzLDAsNS44NDktMC4xNDMsOC43NzQtMC4zOTIgIEMyMTUuMTcsMzcxLjQ5LDE2NC4zNzksMzI5LjAyOSwxNjQuMzc5LDI3Ny4yOTN6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNBRjg2NUQ7IiBkPSJNMzY5Ljk4NiwyNTEuMTV2LTQxLjQzMmMwLTU0LjY5NC00NC40OS05OS4wMzItOTkuMzcyLTk5LjAzMmgtMTAuODM4djQxLjQzMiAgYzAsNTQuNjk0LDQ0LjQ5LDk5LjAzMiw5OS4zNzIsOTkuMDMySDM2OS45ODZ6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNDNjlDNkQ7IiBkPSJNMzIzLjkwNywxNTIuMTE3VjEyNi4xMmMtMTUuNDAxLTkuNzcyLTMzLjY4My0xNS40MzUtNTMuMjkzLTE1LjQzNWgtMjkuMjI4ICBjLTU0Ljg4MiwwLTk5LjM3Miw0NC4zMzgtOTkuMzcyLDk5LjAzMnYyNS45OTdjMTUuNDAxLDkuNzcyLDMzLjY4MywxNS40MzUsNTMuMjk0LDE1LjQzNWgyOS4yMjcgIEMyNzkuNDE3LDI1MS4xNSwzMjMuOTA3LDIwNi44MTEsMzIzLjkwNywxNTIuMTE3eiIvPgo8Zz4KCTxwYXRoIHN0eWxlPSJmaWxsOiM1MzQ3NDE7IiBkPSJNMjA4LjA2NywzMDEuMTY5Yy00LjQ2NSwwLTguMDg0LTMuNjItOC4wODQtOC4wODR2LTEwLjY3N2MwLTQuNDY0LDMuNjItOC4wODQsOC4wODQtOC4wODQgICBzOC4wODQsMy42Miw4LjA4NCw4LjA4NHYxMC42NzdDMjE2LjE1MiwyOTcuNTUsMjEyLjUzMiwzMDEuMTY5LDIwOC4wNjcsMzAxLjE2OXoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiM1MzQ3NDE7IiBkPSJNMzAzLjkzMywzMDEuMTY5Yy00LjQ2NSwwLTguMDg0LTMuNjItOC4wODQtOC4wODR2LTEwLjY3N2MwLTQuNDY0LDMuNjItOC4wODQsOC4wODQtOC4wODQgICBjNC40NjUsMCw4LjA4NCwzLjYyLDguMDg0LDguMDg0djEwLjY3N0MzMTIuMDE3LDI5Ny41NSwzMDguMzk3LDMwMS4xNjksMzAzLjkzMywzMDEuMTY5eiIvPgo8L2c+CjxwYXRoIHN0eWxlPSJmaWxsOiNDNEE0ODY7IiBkPSJNMjU2LjAwMSwzNDAuMDI4QzI1NiwzNDAuMDI4LDI1Ni4wMDEsMzQwLjAyOCwyNTYuMDAxLDM0MC4wMjhjLTkuMTcyLDAtMTcuNzk2LTMuNTcxLTI0LjI4MS0xMC4wNTcgIGMtMy4xNTctMy4xNTctMy4xNTctOC4yNzYsMC0xMS40MzJjMy4xNTctMy4xNTcsOC4yNzYtMy4xNTcsMTEuNDMyLDBjMy40MzIsMy40MzEsNy45OTUsNS4zMjIsMTIuODQ4LDUuMzIyICBzOS40MTYtMS44OSwxMi44NDgtNS4zMjJjMy4xNTctMy4xNTcsOC4yNzYtMy4xNTgsMTEuNDMyLDBjMy4xNTcsMy4xNTgsMy4xNTcsOC4yNzYsMCwxMS40MzIgIEMyNzMuNzk2LDMzNi40NTUsMjY1LjE3MiwzNDAuMDI4LDI1Ni4wMDEsMzQwLjAyOHoiLz4KPHBhdGggc3R5bGU9ImZpbGw6IzgwODA4MDsiIGQ9Ik00MDQuNDc0LDc1LjczMWMwLTI1LjA5NS0yMC40MTMtNDUuNDM4LTQ1LjU5NC00NS40MzhjLTYuMzM1LDAtMTIuMzY4LDEuMjg5LTE3Ljg1MSwzLjYxNyAgQzMzNS45MDgsMTQuMzk5LDMxOC4xMDEsMCwyOTYuOTE4LDBjLTE3LjUwMSwwLTMyLjY5MSw5LjgzMi00MC4zMzQsMjQuMjUxQzI0OC45NDMsOS44MzIsMjMzLjc1MiwwLDIxNi4yNTEsMCAgYy0yMS4zNTQsMC0zOS4yNzIsMTQuNjMzLTQ0LjIyOCwzNC4zODNjLTUuNzYxLTIuNjItMTIuMTU2LTQuMDkxLTE4LjkwMi00LjA5MWMtMjUuMTgxLDAtNDUuNTk0LDIwLjM0My00NS41OTQsNDUuNDM4ICBjMCwyMS4yNzcsMTQuNjc2LDM5LjEzMSwzNC40ODgsNDQuMDc1djkxLjU0NWgyMjcuOTcydi05MS41NDVDMzg5Ljc5OCwxMTQuODYyLDQwNC40NzQsOTcuMDA4LDQwNC40NzQsNzUuNzMxeiIvPgo8cGF0aCBzdHlsZT0ib3BhY2l0eTowLjE7ZW5hYmxlLWJhY2tncm91bmQ6bmV3ICAgIDsiIGQ9Ik0xNDEuMjE2LDc1LjczMWMwLTE5LjE2MSwxMS45MDgtMzUuNTQxLDI4Ljc0Ni00Mi4yMiAgYy01LjIxMi0yLjA3LTEwLjg5LTMuMjE4LTE2Ljg0Mi0zLjIxOGMtMjUuMTgxLDAtNDUuNTk0LDIwLjM0My00NS41OTQsNDUuNDM4YzAsMjEuMjc3LDE0LjY3NiwzOS4xMzEsMzQuNDg4LDQ0LjA3NXY5MS41NDVoMzMuNjkgIHYtOTEuNTQ1QzE1NS44OTEsMTE0Ljg2MiwxNDEuMjE2LDk3LjAwOCwxNDEuMjE2LDc1LjczMXoiLz4KPGc+Cgk8cGF0aCBzdHlsZT0iZmlsbDojOTk5OTk5OyIgZD0iTTIxMC43MjksMTk4LjMzM2MtNC40NjUsMC04LjA4NC0zLjYyLTguMDg0LTguMDg0di0zMy43MjFjMC00LjQ2NSwzLjYyLTguMDg0LDguMDg0LTguMDg0ICAgczguMDg0LDMuNjIsOC4wODQsOC4wODR2MzMuNzIxQzIxOC44MTMsMTk0LjcxNCwyMTUuMTk0LDE5OC4zMzMsMjEwLjcyOSwxOTguMzMzeiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6Izk5OTk5OTsiIGQ9Ik0yNTYsMTk4LjMzM2MtNC40NjUsMC04LjA4NC0zLjYyLTguMDg0LTguMDg0di0zMy43MjFjMC00LjQ2NSwzLjYyLTguMDg0LDguMDg0LTguMDg0ICAgYzQuNDY1LDAsOC4wODQsMy42Miw4LjA4NCw4LjA4NHYzMy43MjFDMjY0LjA4NCwxOTQuNzE0LDI2MC40NjUsMTk4LjMzMywyNTYsMTk4LjMzM3oiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiM5OTk5OTk7IiBkPSJNMzAxLjI3MSwxOTguMzMzYy00LjQ2NSwwLTguMDg0LTMuNjItOC4wODQtOC4wODR2LTMzLjcyMWMwLTQuNDY1LDMuNjItOC4wODQsOC4wODQtOC4wODQgICBjNC40NjUsMCw4LjA4NCwzLjYyLDguMDg0LDguMDg0djMzLjcyMUMzMDkuMzU2LDE5NC43MTQsMzA1LjczNiwxOTguMzMzLDMwMS4yNzEsMTk4LjMzM3oiLz4KPC9nPgo8cmVjdCB4PSIxNDIuMDEyIiB5PSIxODIuMTY3IiBzdHlsZT0iZmlsbDojRUY2NDVFOyIgd2lkdGg9IjIyNy45NzYiIGhlaWdodD0iMjkuMTg2Ii8+CjxyZWN0IHg9IjE0Mi4wMTIiIHk9IjE4Mi4xNjciIHN0eWxlPSJvcGFjaXR5OjAuMTtlbmFibGUtYmFja2dyb3VuZDpuZXcgICAgOyIgd2lkdGg9IjMzLjY4OCIgaGVpZ2h0PSIyOS4xODYiLz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" />';
	echo '</div>';
	echo '<div class="info">';
	echo '<span>Hoje ser� Arroz com Almondega. Bom Apetit!</span>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
}